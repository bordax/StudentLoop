<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
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

    public function store(AlunoRequest $req){
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

    public function update(AlunoRequest $req, $id){
    	$aluno = Aluno::find($id);

    	$aluno->nome = $req->input('nome');
        $aluno->nasc = $req->input('nasc');
        $aluno->serie = $req->input('serie');

        $aluno->cep = $req->input('cep');
        $aluno->rua = $req->input('rua');
        $aluno->numero_endereco = $req->input('numero_endereco');
        $aluno->complemento = $req->input('complemento');
        $aluno->bairro = $req->input('bairro');
        $aluno->cidade = $req->input('cidade');
        $aluno->estado = $req->input('estado');

        $aluno->nome_mae = $req->input('nome_mae');
        $aluno->cpf = $req->input('cpf');
        $aluno->venc = $req->input('venc');

        $aluno->save();

        return 'Aluno com id '.$aluno->id.' editado.';
    }

    public function destroy(Request $req, $id){
    	$aluno = Aluno::find($id);
    	$aluno->delete();

    	return 'Aluno com id '.$aluno->id.' removid.';
    }
}
