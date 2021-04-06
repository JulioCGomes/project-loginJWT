<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Users_Helper;

class UserController extends Controller
{
    /**
     * Login do usuário ao sistema.
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        try {
            return [
                'status' => 200,
                'data' => Users_Helper::loginUsuario($request),
                'msg' => 'Listagem de usuário feita com sucesso.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     * Retornando o usuário logado dentro do sistema.
     *
     * @return void
     */
    public function userLogado()
    {
        try {
            return [
                'status' => 200,
                'data' => Users_Helper::getUsuarioLogado(),
                'msg' => 'Usuário logado retornado com sucesso.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     * Atualizando token do usuário.
     *
     * @return void
     */
    public function refreshToken()
    {
        try {
            return [
                'status' => 200,
                'data' => Users_Helper::atualizarToken(),
                'msg' => 'Token do usuário atualizado com sucesso.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     * Listagem dos usuários que existem dentro do sistema.
     *
     * @return void
     */
    public function index() : Array
    {
        try {
            return [
                'status' => 200,
                'data' => Users_Helper::listarUsuarios(),
                'msg' => 'Listagem de usuário feita com sucesso.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     * Criando o usuário
     *
     * @param Request $params
     * @return Array
     */
    public function create(Request $params) : Array
    {
        try {
            return [
                'status' => 201,
                'data' => Users_Helper::adicionarUsuario($params->all()),
                'msg' => 'Usuário criado com sucesso.'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'msg' => $e->getMessage(),
            ];
        }
    }

    public function update(Request $params, $idCategory) : Array
    {
        try {
            return [
                'status' => 201,
                'data' => Users_Helper::atualizarCategoria($params->all(), $idCategory),
                'msg' => 'Categoria atualizada com sucesso.'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'msg' => $e->getMessage(),
            ];
        }
    }
}
