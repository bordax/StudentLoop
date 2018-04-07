<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard(); //desliga proteção contra mass assignment
        $this->call('AlunosSeeder');
        $this->command->info('Banco de dados populado.');
    }
}
