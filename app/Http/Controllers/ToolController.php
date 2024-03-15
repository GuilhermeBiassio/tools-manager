<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToolRequest;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::orderby('name', 'ASC')->get();
        return view('admin.tool.index')->with('users', $tools);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tool.create')->with('action', route('tool.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToolRequest $request)
    {
        Tool::create($request->all());
        return to_route('tool.index')->with('success.message', 'Dados cadastrados com sucesso!');
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
        $tool = Tool::find($id);
        return view('admin.tool.edit')->with([
            'tool' => $tool,
            'action' => route('tool.update', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToolRequest $request, string $id)
    {
        $data = Tool::find($id);
        $data->fill($request->all());
        $data->update();
        return to_route('tool.index')->with('success.message', 'Dados atualizados!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tool::destroy($id);
        return to_route('tool.index')->with('success.message', 'Ferranenta excluída com sucesso!');
    }
}
