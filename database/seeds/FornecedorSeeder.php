<?php

use Illuminate\Database\Seeder;
use \App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nesse processo estamos instaciando um objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@forneceodr100.com.br';
        $fornecedor->save();

        //Nesse processo estamos usando o método create (atenção ao método fillable da classe Fornecedor)
        Fornecedor::create([
            'nome' =>'Fornecedor 200', 
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        Fornecedor::create([
            'nome' =>'Fornecedor 300', 
            'site' => 'fornecedor300.com.br',
            'uf' => 'sp',
            'email' => 'contato@fornecedor300.com.br'
        ]);

        //Método insert - esse método não funcionou - VERIFICAR
        /*DB::table('fornecedores')->insert([
            'nome' =>'Fornecedor 300', 
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);  */
    }
}
