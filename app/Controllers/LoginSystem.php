<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;

class LoginSystem extends BaseController
{

    /**
     * FUNÇÃO RETORNA A VIEW DE LOGIN, ONDE O USUARIO DIGITA SEU LOGIN E SENHA
     *
     * @return string
     */
    public function index(): string
    {
        return view('login-system');
    }


    /**
     * FUNÇÃO QUE CONSULTA SE EXISTE USUARIO E SENHA CADASTRADO
     *
     * @return void
     */
    public function signIn():void
    {
        $userLogin = strval($this->request->getPost('userLogin'));
        $userPassword = strval($this->request->getPost('userPassword'));

        $usersModel = new UsersModel();

        $dataUser = $usersModel->getByUserLogin($userLogin);

        /**
         * CASO EXISTA USUARIO ELE COMPARA SE A SENHA DIGITADA É IGUAL A SENHA ARMAZENADA NO BANCO DE DADOS
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
     * FUNÇÃO PARA SAIR DA AREA ADMINISTRATIVO, FINALIZANDO A SESSAO E RETORNA A BASE URL
     *
     * @return RedirectResponse
     */
    public function signOut():RedirectResponse
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
