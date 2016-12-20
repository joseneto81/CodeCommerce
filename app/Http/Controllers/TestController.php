<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class TestController extends Controller
{
    public function getExemplo()
    {
        return 'oi';
    }

    public function getLogin()
    {
        $data = [
            'email'=>"bart@gmail.com",
            'password'=>'123456'
        ];

        //executa o processo de login
        if(Auth::attempt($data))
            return "Logou";

        return "Falhou";
    }

    public function getLogout()
    {
        Auth::logout();

        //verifica se o usuario encontra-se logado
        if(Auth::check())
            return 'Ainda logado';

        return 'Deslogado';
    }
}
