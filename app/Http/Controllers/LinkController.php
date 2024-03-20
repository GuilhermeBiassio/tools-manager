<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tool;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest;
use Illuminate\Support\Facades\Redirect;

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
            ->paginate(10);
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
            'borrowed' => date('Y-m-d H:i:s')
        ];
        Link::create($data);
        $update = Tool::find($request->tool);
        $update->in_use = 1;
        $update->update();
        return to_route('link.show', $request->employee)->with('success.message', 'Vínculo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $name = Employee::find($id);
        $data = Link::where('id_employee', '=', $id)
            ->select('links.*', 'tools.name')
            ->join('tools', 'tools.id', '=', 'links.id_tool')
            ->orderBy('returned', 'ASC')
            ->paginate(10);
        return view('link.show')->with([
            'name' => $name,
            'datas' => $data
        ]);
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
        $link = Link::find($id);
        $tool = Tool::find($link->id_tool);
        $tool->in_use = 0;
        $tool->update();
        $link->returned = date('Y-m-d H:i:s');
        $link->update();

        return Redirect::back()->with('success.message', "$tool->name devolvido(a)");
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
