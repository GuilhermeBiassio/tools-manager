<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tool;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Link::where('returned', '=', NULL)
            ->select('links.*', 'employees.name as employee_name', 'tools.name as tool_name', 'tools.serial_number')
            ->join('employees', 'links.id_employee', '=', 'employees.id')
            ->join('tools', 'links.id_tool', '=', 'tools.id')
            ->orderBy('borrowed', 'DESC')
            ->get();
        return view('link.index')->with('tools', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('link.create')->with(array_merge($this->lists(), ['action' => route('link.store')]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LinkRequest $request)
    {
        $data = [
            'id_tool' => $request->tool,
            'id_employee' => $request->employee,
            'borrowed' => date('Y-m-d H:I:s')
        ];
        Link::create($data);
        $update = Tool::find($request->tool);
        $update->in_use = 1;
        $update->update();
        return to_route('link.index')->with('success.message', 'Vínculo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function lists()
    {
        $tools = Tool::where('in_use', '=', 0)
            ->orderBy('name', 'ASC')
            ->get();
        $employees = Employee::orderBy('name', 'ASC')->get();
        return [
            'tools' => $tools,
            'employees' => $employees
        ];
    }
}
