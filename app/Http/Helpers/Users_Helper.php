<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Users_Helper
{
    /**
     * Login usuário JWT
     *
     * @param [type] $request
     * @return void
     */
    public static function loginUsuario($request) {
        $credentials = $request->only('email', 'password');
            
        // Fazendo autenticação e inserindo no token
        if (! $token = JWTAuth::attempt($credentials)) {
            throw new \Exception("E-mail ou senha digitado está incorreto.");
        }

        return [
            'token' => $token,
            'usuario' => auth()->user()
        ];
    }

    /**
     * Retorna o usuário logado dentro do sistema.
     *
     * @return void
     */
    public static function getUsuarioLogado() {

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            throw new \Exception("Usuário não encontrado, logue novamente.");
        }

        // Token validado e está retornando o usuário que está logado.
        return auth()->user();
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

    /**
     * Adiciona usuário ao banco de dados
     * 
     * @return Array
     */
    public static function adicionarUsuario(array $param) : Array
    {
        self::getTokenUsuario();

        if (empty($param['nome'])) {
            throw new \Exception('Informa o nome da usuario.');
        }

        if (empty($param['email'])) {
            throw new \Exception('Informe um e-mail para cadastro.');
        }

        if (empty($param['password'])) {
            throw new \Exception('Informe uma senha para o usuário.');
        }

        $usuario = new User();
        $usuario->name = $param['nome'];
        $usuario->email = $param['email'];
        $usuario->password = Hash::make($param['password']);
        $usuario->save();

        return User::OrderBy('id', 'desc')->first()->toArray();
    }

    /**
     * Atualizando token do usuário.
     *
     * @return void
     */
    public static function atualizarToken()
    {
        $token = self::getTokenUsuario();

        return JWTAuth::refresh(); 
    }
}