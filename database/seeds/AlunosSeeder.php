<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlunosSeeder extends Seeder
{
    public function run()
    {
        DB::table('alunos')->delete();

        Aluno::create(array(
            'nome' => 'Joao Antonio',
            'nasc' => Carbon::create('2004', '01', '01')
            'serie' => 7
            'cep' => '13566540'
            'rua' => 'Rua 1'
            'complemento' => 'Ap 132'
            'numero_endereco' => '130'
            'bairro' => 'Jardim Acapulco'
            'cidade' => 'São carlos'
            'estado' => 'SP'
            'nome_mae' => 'Maria Silva'
            'cpf' => '34847456068'
            'venc' => 25
        ));

        Aluno::create(array(
            'nome' => 'Anderson Santos',
            'nasc' => Carbon::create('2005', '02', '12')
            'serie' => 9
            'cep' => '06543285'
            'rua' => 'Rua 2'
            'complemento' => '236'
            'numero_endereco' => ''
            'bairro' => 'Pq Monte Claro'
            'cidade' => 'São carlos'
            'estado' => 'SP'
            'nome_mae' => 'Andreia Santos'
            'cpf' => '23760084095'
            'venc' => 13
        ));

        Aluno::create(array(
            'nome' => 'Caio Cesar',
            'nasc' => Carbon::create('2008', '09', '07')
            'serie' => 2
            'cep' => '04841040'
            'rua' => 'Rua XV de Novembro'
            'complemento' => ''
            'numero_endereco' => '1768'
            'bairro' => 'Centro'
            'cidade' => 'São carlos'
            'estado' => 'SP'
            'nome_mae' => 'Celia Costa'
            'cpf' => '70048245003'
            'venc' => 3
        ));
    }
}
