<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;
use App\Models\User;

class Users_Helper
{
    /**
     * Retorna a categoria que deseja e as colunas que gostaria.
     *
     * @param integer $idCategoria
     * @param array $nomeColuna
     * @return Array
     */
    public static function getCategoria(int $idCategoria, array $nomeColuna = []) : Array
    {
        if (empty($idCategoria)) {
            throw new \Exception('Informa o id da categoria.');
        }

        $categoria = (Category::Where('id', '=', $idCategoria)->get())->toArray();

        if (empty($categoria)) {
            throw new \Exception('Essa categoria não existe.');
        }

        return current($categoria); 
    }

    /**
     * Retorna as categorias cadastradas
     * 
     * @return Array
     */
    public static function listarUsuarios() : Array
    {
        $usuarios = (User::all())->toArray();

        if (empty($usuarios)) {
            throw new \Exception('Listagem de usuarios vazia');
        }

        return $usuarios;
    }
}