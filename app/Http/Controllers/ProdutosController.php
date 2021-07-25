<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Http\Utils\File;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = '';
        $produtos = [];
        switch ($request->has('categoria')) {
            case 'bolos':
                $filtro = $request->categoria;
                break;
            case 'salgados':
                $filtro = $request->categoria;
                break;
            
            default:
                $produtos = Produto::paginate(3);
                return response()->json($produtos, 200);
                break;
        };
        $produtos = Produto::where('categoria', $filtro)->paginate(3);
        return response()->json($produtos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $dados = $request->all();
        try {
            $nomeArquivo = File::constroiNomeArquivo($request->imagem);
            $caminho = File::upload($request->imagem, 'imgs', $nomeArquivo);
            $dados['imagem'] = $caminho;
            Produto::create($dados);
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
            return response()->json($th);
        }
        return response()->json(['msg' => 'adicionado com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::where('id', $id)->first();
        if($produto){
            return response()->json($produto, 200);   
        }else{
            return response()->json(['erro' => 'algo deu errado'], 404);   
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::where("id", $id)->first();
        $dados = $request->all();
        try {
            if($dados['imagem']){
                if(Storage::exists($produto->imagem)){
                    Storage::delete($produto->imagem);
                    $nomeArquivo = File::constroiNomeArquivo($request->imagem);
                    $caminho = File::upload($request->imagem, 'imgs', $nomeArquivo);
                    $dados['imagem'] = $caminho;
                }
            }
            $produto->update($dados);
            return response()->json(['msg', 'produto alterado com sucesso', 'produto' => $produto], 200);
        } catch (\Throwable $th) {
            //throw $th;
            //dd($th);
            return response()->json(['erro', 'algo deu errado :('], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::where('id', $id)->first();
        if($produto != null && Storage::exists($produto->imagem)){
            Storage::delete($produto->imagem);
            $produto->delete();
            return response()->json(['msg' => 'excluido com sucesso'], 200);
        }else{
            return response()->json(['erro' => 'algo deu errado'], 404);   
        }
    }
}
