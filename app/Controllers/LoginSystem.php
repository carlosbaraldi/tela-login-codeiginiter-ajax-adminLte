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
        $userLogin = $this->request->getPost('userLogin');
        $userPassword = $this->request->getPost('userPassword');

        $usersModel = new UsersModel();

        $dataUser = $usersModel->getByUserLogin($userLogin);

        dd($dataUser);

        /**
         * Verifica se existe usuário cadastrado no banco de dados com o userLogin e userPassword passado pelo usuário
         */
        if (count($dataUser) > 0) {
            $hashUsuario = $dataUser['userPassword'];
            if (password_verify($userPassword, $hashUsuario)) {
                session()->set('isLoggedIn', true);
                session()->set('userLogin', $dataUser['userLogin']);
                return redirect()->to(base_url());
            } else {
                session()->setFlashData('msg', 'Usuário ou Senha incorretos');
                return redirect()->to('/LoginSystem');
            }
        } else {
            session()->setFlashData('msg', 'Usuário ou Senha incorretos');
            return redirect()->to('/LoginSystem');
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
