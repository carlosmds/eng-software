<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            [
                'id' => 1234,
                'nome' => 'João Silva',
                'departamento' => 'Vendas',
                'data_admissao' => '2016-06-18',
                'horas_treinamento_necessarias' => 24,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 2345,
                'nome' => 'Maria Paula',
                'departamento' => 'Produção',
                'data_admissao' => '2018-02-12',
                'horas_treinamento_necessarias' => 40,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 3456,
                'nome' => 'Carlos Gonçalves',
                'departamento' => 'Propaganda',
                'data_admissao' => '2000-11-18',
                'horas_treinamento_necessarias' => 60,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 4567,
                'nome' => 'Alan Castilho',
                'departamento' => 'Propaganda',
                'data_admissao' => '2019-03-10',
                'horas_treinamento_necessarias' => 16,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 5678,
                'nome' => 'Beatriz Figueiredo',
                'departamento' => 'Produção',
                'data_admissao' => '2010-07-26',
                'horas_treinamento_necessarias' => 56,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 6789,
                'nome' => 'Natalia Severino',
                'departamento' => 'Expedição',
                'data_admissao' => '2012-05-18',
                'horas_treinamento_necessarias' => 32,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 7890,
                'nome' => 'Marta Arruda',
                'departamento' => 'Vendas',
                'data_admissao' => '2009-12-15',
                'horas_treinamento_necessarias' => 80,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 8901,
                'nome' => 'Raul Loureiro',
                'departamento' => 'Propaganda',
                'data_admissao' => '2020-10-17',
                'horas_treinamento_necessarias' => 24,
                'horas_treinamento_realizadas' => 0,
            ],
            [
                'id' => 9012,
                'nome' => 'Luis Antunes',
                'departamento' => 'Propaganda',
                'data_admissao' => '2007-03-15',
                'horas_treinamento_necessarias' => 48,
                'horas_treinamento_realizadas' => 0,
            ],
        ]);
    }
}
