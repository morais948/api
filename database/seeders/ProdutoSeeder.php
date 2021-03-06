<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = [
            [
                'nome' => 'bolo da moça',
                'descricao' => 'bolo delicioso',
                'preco' => 15.50,
                'quantidade' => 20,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo de chocolate',
                'descricao' => 'bolo de chocolate ao leite',
                'preco' => 12.50,
                'quantidade' => 35,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo de doce de leite',
                'descricao' => 'bolo delicioso',
                'preco' => 10.50,
                'quantidade' => 15,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo branco',
                'descricao' => 'o melhor bolo branco da região',
                'preco' => 35.70,
                'quantidade' => 200,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo napolinato',
                'descricao' => 'bolo inglês napolitano',
                'preco' => 40,
                'quantidade' => 36,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo de nutela',
                'descricao' => 'bolo divinamente bom',
                'preco' => 25,
                'quantidade' => 20,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo da copa',
                'descricao' => 'o bolo mais brasileiro',
                'preco' => 10,
                'quantidade' => 13,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo de pote',
                'descricao' => 'você ficará impressionado com o bolo e o potinho :)',
                'preco' => 12,
                'quantidade' => 50,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo de banana',
                'descricao' => 'O bolo que te conquista',
                'preco' => 8,
                'quantidade' => 23,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            [
                'nome' => 'bolo verde',
                'descricao' => 'bolo do hulk',
                'preco' => 22,
                'quantidade' => 18,
                'categoria' => 'bolos',
                'imagem' => 'imgs_padrao/bolo-teste.png',
            ],
            //salgados
            [
                'nome' => 'coxinha',
                'descricao' => 'coxinha quentinha',
                'preco' => 5,
                'quantidade' => 20,
                'categoria' => 'salgados',
                'imagem' => 'imgs_padrao/salgado-teste.png',
            ],
            [
                'nome' => 'enroladinho',
                'descricao' => 'enroladinho daora',
                'preco' => 5,
                'quantidade' => 18,
                'categoria' => 'salgados',
                'imagem' => 'imgs_padrao/salgado-teste.png',
            ],
            [
                'nome' => 'pastel',
                'descricao' => 'crocante e quentinho',
                'preco' => 5,
                'quantidade' => 25,
                'categoria' => 'salgados',
                'imagem' => 'imgs_padrao/salgado-teste.png',
            ],
            [
                'nome' => 'empada',
                'descricao' => '',
                'preco' => 5,
                'quantidade' => 10,
                'categoria' => 'salgados',
                'imagem' => 'imgs_padrao/salgado-teste.png',
            ],
            [
                'nome' => 'pastel de queijo',
                'descricao' => '+ queijo + sabor',
                'preco' => 5,
                'quantidade' => 32,
                'categoria' => 'salgados',
                'imagem' => 'imgs_padrao/salgado-teste.png',
            ],
        ];

        DB::table('produtos')->insert($attr);
    }
}
