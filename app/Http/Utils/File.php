<?php

namespace App\Http\Utils;

class File
{
    public static function upload($file, $path, $name){
        try {
            if($file->isValid()){
                $caminho = $file->storeAs($path, $name);
                return $caminho;
            }else{
                throw new Exception('Imagem inválida');
            }
        } catch (\Exception $err) {
            return $err;
        }
    }

    public static function constroiNomeArquivo($file){
        $nomeArquivo = str_split($file->getClientOriginalName(), strpos($file->getClientOriginalName(), '.'))[0]; //pega a nome do arquivo
        $extensao = $file->getClientOriginalExtension(); //pega a extensão do arquivo
        $nomeArquivo = md5($nomeArquivo) . "." . $extensao;
        return $nomeArquivo;
    }
}