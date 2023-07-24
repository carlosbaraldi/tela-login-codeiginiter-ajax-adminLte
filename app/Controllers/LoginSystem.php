<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginSystem extends BaseController
{

    public function index()
    {
        return view('login-system');
    }


    public function signIn()
    {
        $userLogin = strval($this->request->getPost('userLogin'));
        $userPassword = strval($this->request->getPost('userPassword'));

        $usersModel = new UsersModel();

        $dataUser = $usersModel->getByUserLogin($userLogin);

        /**
         * Verifica se existe usuário cadastrado no banco de dados com o userLogin e userPassword passado pelo usuário
         */
        if (count($dataUser) > 0) {
            $hashUsuario = $dataUser['userPassword'];
            if (password_verify($userPassword, $hashUsuario)) {
                session()->set('isLoggedIn', true);
                session()->set('userLogin', $dataUser['userLogin']);

                $date = [
                    'status' => '1',
                    'url' => base_url('/home/index'),
                    'message' => 'Usuário encontrado :)',
                ];

                echo json_encode($date, JSON_UNESCAPED_UNICODE);
            } else {

                $date = [
                    'status' => '0',
                    'url' => '',
                    'message' => 'Usuário e/ou senha incorretos :(',
                ];

                echo json_encode($date, JSON_UNESCAPED_UNICODE);
            }
        } else {

            $date = [
                'status' => '0',
                'url' => '',
                'message' => 'Usuário e/ou senha incorretos :(',
            ];
            echo json_encode($date, JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Realiza o logout do sistema finalizando a sessão
     *
     * @return void
     */
    public function signOut()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
