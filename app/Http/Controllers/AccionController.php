<?php

namespace App\Http\Controllers;

use App\Notifications\AssignDocument;
use App\Type;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Assign;
use App\Emision;
use App\Document;
use App\Office;
use App\User;
use Illuminate\Support\Facades\Storage;

class AccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:documents.elaborar')->only(['elaborar']);
        $this->middleware('permission:documents.asignar')->only(['asignar', 'asignado']);
        $this->middleware('permission:documents.asignados')->only(['asignados']);
        $this->middleware('permission:documents.atender')->only(['atendido']);
        $this->middleware('permission:documents.enviar')->only(['enviar', 'enviado']);
        $this->middleware('permission:documents.enviados')->only(['enviados']);
    }

    public function elaborar()
    {
        $offices = Office::orderBy('nombre')->get();
        $documents = Document::orderBy('titulo')->get();
        $tipos = Type::pluck('nombre', 'id');
        $types = Type::orderBy('nombre')->get();
        return  view('admin.documentos.elaborar', [
            'offices' => $offices,
            'types' => $types,
            'documents' => $documents,
            'tipos' => $tipos,
        ]);
    }

    public function asignar()
    {
        $documents = Document::orderBy('titulo', 'DESC')->get();
        $users = User::where('id', '!=', auth()->user()->id)->orderBy('name', 'DESC')->get();

        return view('admin.pages.asignarDocumento', [
            'documents' => $documents, 
            'users' => $users
        ]);
    }

    public function asignados()
    {
        $assigns = Assign::where('user_id', auth()->user()->id)
                        ->orderBy('fecha', 'DESC')->paginate(8);

        return view('admin.pages.asignados', [
            'assigns' => $assigns,
        ]);
    }

    public function emitir()
    {
        $documents = Document::orderBy('titulo', 'DESC')->get();
        $offices = Office::orderBy('nombre', 'DESC')->get();

        return view('admin.pages.enviarDocumento', [
            'documents' => $documents,
            'offices' => $offices
        ]);
    }

    public function enviados()
    {
        $emisions = Emision::orderBy('fecha', 'DESC')->paginate(8);

        return view('admin.pages.enviados', [
            'emisions' => $emisions,
        ]);
    }

    public function elaborado(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'asunto' => 'required|max:250',
            'origen' => 'required',
            'destino' => 'required',
            'tipo' => 'required',
        ]);

        

        $document = new Document();
        
        $document->cod_documento = $request->cod_documento;
        $document->titulo = $request->titulo;
        $document->asunto = $request->asunto;
        $document->origen = $request->origen;
        $document->destino = $request->destino;
        $document->type_id = $request->tipo;
        $document->user_id = auth()->user()->id;


        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $phpWord->addSection();
        //if ($request->tipo == "Informe técnico") {
            $newSection->addText(
                '"Documento elaborado. '
                    . 'Informe de soporte tecnico." '
                    . '(MIN)'
            );
       // } else {
            # code...
       // }
        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {
            $archivo = str_slug($document->titulo).'.docx';
            $document->archivo = Storage::url($archivo);
            $objWriter->save(storage_path($archivo));
        } catch (\Throwable $th) {
            
        }
        //dd($document->archivo);
        return response()->download(storage_path($archivo));
   
        

        if ($document->save()){

            return response()->download(storage_path($archivo))->with('info', 'El documento se elaborado con exitó');
      //return redirect()->route('documentos.index')
                //->with('info', 'El documento se elaborado con exitó');
        }else{
            return back();
        }
       
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

            //Buscamos al usuario a enviar la notificación
            $personal = User::find($request->get('personal'));

            // Le enviamos una notificación con la asignación de documentos
            $personal->notify(new AssignDocument($assign->document, $assign->fecha));

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

    public function atendido(Request $request)
    {
        $documento = Document::findOrFail($request->documento);

        $documento->estado = $request->get('estado');

        if ($documento->save()){
            if ($documento->estado == 'atendido')
                return redirect()->route('documentos.asignados')
                    ->with('info', 'El documento ha sido atendido con exitó');
            else
                return redirect()->route('documentos.asignados')
                    ->with('info', 'El documento no ha sido atendido con exitó');
        }else{
            return back();
        }
    }
}
