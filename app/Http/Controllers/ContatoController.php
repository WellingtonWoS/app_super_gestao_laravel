<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;
use Symfony\Contracts\Service\Attribute\Required;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',   //Nomes com mínimo de 3 caracteres e máximo 40.
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa  ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O campo informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => ' A mensagem deve ter no máximo 200 caracteres',
            
            'required' => ' O campo :attribute deve ser preenchido',
        ];
        
        //Realizar a validação dos dados do formulário recebidos no request
        $request->validate($regras, $feedback);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }
}
