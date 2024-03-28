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
        $tools = Tool::where('active', '=', '1')
        ->orderby('name', 'ASC')->get();
        return view('admin.tool.index')->with('tools', $tools);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tool.form')->with('action', route('tool.store'));
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
        return view('admin.tool.form')->with([
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
        $data = Tool::find($id);
        $data->active = 0;
        $data->update();

        return to_route('tool.index')->with('success.message', 'Ferranenta excluída com sucesso!');
    }

    public function qrGenerator($id, $name, $serial)
    {
        return [
            'qrcode' => (new QRCode())->render($id),
            'name' => $name,
            'serial_number' => $serial
        ];
        ;
    }

    public function qrcode(string $id)
    {
        $codes = array();
        if ($id == 'all') {
            $tools = Tool::all();
            foreach ($tools as $tool) {
                $codes[] = $this->qrGenerator($tool->id, $tool->name, $tool->serial_number);
            }
        } else {
            $tool = Tool::find($id);
            $codes[] = $this->qrGenerator($id, $tool->name, $tool->serial_number);
        }
        // dd($imgs);

        return view('admin.tool.qr')->with('codes', $codes);
    }
}
