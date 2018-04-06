<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlunosController extends Controller
{
    
    public function index($id = null){
    	if($id ==null){
    		return Aluno::orderBy('id', 'asc')->get();
    	}
    	else{
    		return $this->show($id);
    	}
    }

    public function store(Request $req){
    	$post = new Aluno;
    	
    	$post->nome = $req->input('nome');
        $post->nasc = $req->input('nasc');
        $post->serie = $req->input('serie');

        $post->cep = $req->input('cep');
        $post->rua = $req->input('rua');
        $post->numero_endereco = $req->input('numero_endereco');
        $post->complemento = $req->input('complemento');
        $post->bairro = $req->input('bairro');
        $post->cidade = $req->input('cidade');
        $post->estado = $req->input('estado');

        $post->nome_mae = $req->input('nome_mae');
        $post->cpf = $req->input('cpf');
        $post->venc = $req->input('venc');

        $post->save();

        return 'Aluno regintrado com o id '.$post->id;
    }

    public function show($id){
		return Aluno::find($id);    	
    }

    public function update(Resquest $req, $id){
    	$aluno = Aluno::find($id);

    	$post->nome = $req->input('nome');
        $post->nasc = $req->input('nasc');
        $post->serie = $req->input('serie');

        $post->cep = $req->input('cep');
        $post->rua = $req->input('rua');
        $post->numero_endereco = $req->input('numero_endereco');
        $post->complemento = $req->input('complemento');
        $post->bairro = $req->input('bairro');
        $post->cidade = $req->input('cidade');
        $post->estado = $req->input('estado');

        $post->nome_mae = $req->input('nome_mae');
        $post->cpf = $req->input('cpf');
        $post->venc = $req->input('venc');

        $post->save();

        return 'Aluno com id '.$aluno->id.' editado.';
    }

    public function destroy(Request $req, $id){
    	$aluno = Aluno::find($id);
    	$aluno->delete();

    	return 'Aluno com id '.$aluno->id.' removid.';
    }
}
