<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Users_Helper;

class UserController extends Controller
{
    /**
     * Undocumented function
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
