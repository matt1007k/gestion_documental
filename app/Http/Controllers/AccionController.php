<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Assign;
use App\Emision;
use App\Document;
use App\Office;
use App\User;

class AccionController extends Controller
{
    public function elaborar()
    {
        
    }

    public function asignar()
    {
        $documents = Document::orderBy('titulo', 'DESC')->get();
        $users = User::orderBy('name', 'DESC')->get();

        return view('admin.pages.asignar', [
            'documents' => $documents, 
            'users' => $users
        ]);
    }

    public function emitir()
    {
        $documents = Document::orderBy('titulo', 'DESC')->get();
        $users = User::orderBy('name', 'DESC')->get();

        return view('admin.pages.asignar', [
            'documents' => $documents, 
            'users' => $users
        ]);
    }

    public function asignado(Request $request)
    {
        $this->validate($request, [
            'personal' => 'required',
            'documento' => 'required',
            'observacion' => 'required|max:250'
        ]);

        $assign = new Assign;
        $assign->user_id = $request->get('personal');
        $assign->document_id = $request->get('documento');
        $assign->observacion = $request->get('observacion');
        $assign->fecha = new \DateTime('now');

        if ($assign->save()){
            return redirect()->route('documentos.index')
                ->with('info', 'El documento se asigno con exitó');
        }else{
            return back();
        }
    }

    public function enviado(Request $request)
    {
        $this->validate($request, [
            'oficina' => 'required',
            'documento' => 'required',
            'observacion' => 'required|max:250'
        ]);

        $emision = new Emision;
        $emision->office_id = $request->get('oficina');
        $emision->document_id = $request->get('documento');
        $emision->observacion = $request->get('observacion');
        $emision->fecha = new \DateTime('now');

        if ($emision->save()){
            return redirect()->route('documentos.index')
                ->with('info', 'El documento se envió con exitó');
        }else{
            return back();
        }
    }
}
