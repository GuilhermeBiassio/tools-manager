<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use App\Http\Requests\ToolRequest;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::orderby('name', 'ASC')->get();
        return view('admin.tool.index')->with('tools', $tools);
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
        $data = [
            'name' => mb_strtoupper($request->name),
            'serial_number' => $request->serial_number
        ];
        Tool::create($data);
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
        $update = [
            'name' => mb_strtoupper($request->name),
            'serial_number' => $request->serial_number
        ];
        $data = Tool::find($id);
        $data->fill($update);
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

    public function qrcode(string $id)
    {
        $imgs = array();
        if ($id == 'all') {
            $tools = Tool::all();
            foreach ($tools as $tool) {
                print_r($tool);
                echo "<\br>";
                $imgs = [
                    'qrcode' => (new QRCode())->render($tool->id),
                    'name' => $tool->name,
                    'serial_number' => $tool->serial_number
                ];
            }
        } else {
            $qr = (new QRCode())->render($id);
        }
        // dd($imgs);
    }
}
