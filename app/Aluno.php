<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = array('id', 'nome', 'serie','cep','rua', 'bairro', 'complemento', 'numero_endereco', 'cidade', 'estado','nome_mae', 'cpf', 'venc');
}
