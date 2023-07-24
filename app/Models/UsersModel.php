<?php

namespace App\Models;

use CodeIgniter\Model;


class UsersModel extends Model
{
    protected $table = 'tbUsers';
    protected $primaryKey = 'idUser';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'userName',
        'userLogin',
        'userPassword'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'userName' => 'required',
        'userLogin' => 'required',
        'userPassword' => 'required',
    ];


    public function getByUserLogin(string $userLogin)
    {
        $rq =  $this->select('idUser, userName, userLogin, userPassword')
            ->where('userLogin', $userLogin)
            ->first();

        return !is_null($rq) ? $rq : [];
    }
}
