<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\User;

use Illuminate\Http\Request;

class CursoController extends Controller
{
       
    public function index(){

        $user = User::find(1);
        return $user->profile;

        // $cursos = Curso::orderBy('id', 'desc')->get();
        // return view('cursos.listar', compact('cursos'));

    }


    public function create(){
        return view('cursos.create');
    }

    public function store(Request $request){
        
        $curso= new Curso();
        $curso->name=$request->name;
        $curso->descripcion=$request->descripcion;
     
        //ADJUNTAR EL PDF
         $file=$request->file("urlPdf");
         $nombreArchivo = "pdf_".time().".".$file->guessExtension();
         $request->file('urlPdf')->storeAs('public/imagenes', $nombreArchivo );
         $curso->urlPdf = $nombreArchivo;
         $curso->save();
         return redirect()->route('curso.index');
    }
    
    public function show(Curso $curso){//encontrar el curso por el ID

        return view('cursos.show',compact('curso'));

    }

    //Destroy
    public function destroy (Curso $curso){
        $curso->delete();
        return redirect()->route('curso.index');
    }

    public function edit(Curso $curso){//Encuentro el Curso
       
        return view('cursos.edit',compact('curso'));
  
      }

     //Update
    public function update(Request $request, Curso $curso){
            
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->save();
     
        return redirect()->route('curso.index');
     
      }
  
  
    

}
