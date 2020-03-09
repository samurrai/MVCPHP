<?php

namespace Controllers;

use Core\_abstracts\Controller;
use Core\Auth;
use Klein\Request;
use Klein\Response;
use Models\Users;

class LoginController extends Controller 
{
    public function login(Request $request)
    {
        $this->render('login', ['title' => 'Login', 'username' => $request->param('username')]);
    }

    public function make(Request $request, Response $response)
    {
        $username = $request->param('username');
        $password = $request->param('password');

        $where = ['username' => $username];
        if (!Users::has($where)) {
            return $this->redirectOnFail($username, $response);
        }

        $user = Users::get('*', $where);

        if (!Auth::login($username, $password)) {
            return $this->redirectOnFail($username, $response);
        }
        
        return $response->redirect('/');
    }

    private function redirectOnFail($username, Response $response)
    {
        return $response->redirect("/login?username=$username");
    }

    public function logout(Response $response)
    {
        Auth::logout();
        return $response->redirect('/');
    }
}
