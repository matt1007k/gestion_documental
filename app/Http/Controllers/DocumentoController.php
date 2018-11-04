<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Office;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Document;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:documents.index')->only(['index']);
        $this->middleware('permission:documents.show')->only(['show']);
        $this->middleware('permission:documents.create')->only(['create', 'store']);
        $this->middleware('permission:documents.edit')->only(['edit', 'update']);
        $this->middleware('permission:documents.destroy')->only(['destroy']);
    }

    public function index()
    {
        $documents = Document::where('user_id', auth()->user()->id)->orderBy('id','Desc')->get();
        return view('admin.documentos.index', compact('documents'));
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);

        return  view('admin.documentos.show', ['document' => $document]);
    }

    public function create()
    {
        $offices = Office::orderBy('nombre')->get();
        $documents = Document::orderBy('titulo')->get();
        $tipos = Type::pluck('nombre', 'id');
        $types = Type::orderBy('nombre')->get();
        return  view('admin.documentos.create', [
            'offices' => $offices,
            'types' => $types,
            'documents' => $documents,
            'tipos' => $tipos,
        ]);
    }

    public function store(DocumentRequest $request)
    {
        $document = new Document();
        
        $document->cod_documento = $request->cod_documento;
        $document->titulo = $request->titulo;
        $document->asunto = $request->asunto;
        $document->origen = $request->origen;
        $document->destino = $request->destino;
        $document->type_id = $request->tipo;
        $document->user_id = auth()->user()->id;

        // Almacenamos o subirmos a la carpeta storage/app/public
        $archivo = $request->file('archivo')->store('public');
        // Creamos la ruta con storage/nombre_archivo.ext
        $document->archivo = Storage::url($archivo);

        if ($document->save()){

            // Guardar los documentos adjuntados
            $document->documentos()->sync($request->documentos);
            return redirect()->route('documentos.index')
                ->with('info', 'El documento se registró con exitó');
        }else{
            return back();
        }


    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);

        $offices = Office::orderBy('nombre')->get();
        $documents = Document::where('id', '!=', $id)->orderBy('titulo')->get();
        $tipos = Type::pluck('nombre', 'id');
        $types = Type::orderBy('nombre')->get();

        return view('admin.documentos.edit', [
            'document' => $document,
            'offices' => $offices,
            'types' => $types,
            'documents' => $documents,
            'tipos' => $tipos,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'asunto' => 'required|max:255',
        ]);

        $document = Document::findOrFail($id);
        $document->cod_documento = $request->cod_documento;
        $document->titulo = $request->titulo;
        $document->asunto = $request->asunto;
        $document->origen = $request->origen;
        $document->destino = $request->destino;
        $document->type_id = $request->tipo;
        $document->user_id = auth()->user()->id;

        if($request->file('archivo') != null){
            $pathArchivo = str_replace('storage','public',$document->archivo);
            // Eliminamos el archivo del sistema
            Storage::delete($pathArchivo);
            // Guardamos el archivo
            $archivo = $request->file('archivo')->store('public');
            $document->archivo = Storage::url($archivo);
        }

        if($document->save()){

            // Guardar los documentos adjuntados
            $document->documentos()->sync($request->documentos);

            return redirect()->route('documentos.index')
                ->with('info', 'El documento se editó con exitó');
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
    }
}
