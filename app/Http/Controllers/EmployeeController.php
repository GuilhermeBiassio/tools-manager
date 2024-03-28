<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Employee::orderby('name', 'ASC')->get();
        return view('admin.employee.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.form')->with('action', route('employee.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = [
            'name' => mb_strtoupper($request->name),
            'id' => $request->id
        ];
        Employee::create($data);
        return to_route('employee.index')->with('success.message', 'Dados cadastrados com sucesso!');
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
        $user = Employee::find($id);
        return view('admin.employee.form')->with([
            'user' => $user,
            'action' => route('employee.update', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $update = [
            'name' => mb_strtoupper($request->name),
            'id' => $request->id
        ];
        $data = Employee::find($id);
        $data->fill($update);
        $data->update();
        return to_route('employee.index')->with('success.message', 'Dados atualizados!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return to_route('employee.index')->with('success.message', 'Funcionário excluído com sucesso!');
    }
}
