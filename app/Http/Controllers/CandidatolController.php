<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Candidatos;


class CandidatosController extends Controller
{
    public function cadastroCandidato()
    {
        return view('cadastrarCandidatos');            
    }

    public function SalvarBancoCandidato(Request $request){

        $dadosCandidato = $request->validate([
            'nome' => 'string|required',
            'email' => 'string|required',
            'DataDeNascimento' => 'string|required',
            'telefone' => 'string|required',
            
    
        ]);
    
        Candidatos::create($dadosCandidato);
    
        return Redirect::route('editar-candidato');
        
}

public function PesquisarCandidato(Request $request){
            
    $dadosCandidato = Candidatos::query();
    $dadosCandidato->when($request->nome,function($query, $v1){
        $query->where('nome','like','%'.$v1.'%');
    });

    $dadosCandidato = $dadosCandidato->get();
    
   return view('editarCandidato',['registroCandidato' => $dadosCandidato]);
}

public function MostrarAlterarCandidato(Candidatos $registroCandidato){

    return view('alterarCandidato', ['registroCandidato' => $registroCandidato]);
}

public function apagarCandidato(Candidatos $registroCandidato){
        
        
    $registroCandidato->delete();


    return Redirect::route('editar-candidato');
}

public function AlterarBancoCandidato(Candidatos $registroCandidato, Request $request){

    $banco = $request->validate([
    'nome' => 'string|required',
    'email' => 'string|required',
    'DataDeNascimento' => 'string|required',
    'telefone' => 'string|required',
    

    ]);

    $registroCandidato->fill($banco);
    $registroCandidato->save();

    

    return Redirect::route('editar-candidato');
}

}