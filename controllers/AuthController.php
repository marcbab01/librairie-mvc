<?php
namespace App\Controllers;

use App\Models\User;
use App\Providers\View;
use App\Providers\Validator;

class AuthController {

    public function index(){
        return View::render('auth/index');
    }

    public function store($data=[]){
        $validator = new Validator;
        $validator->field('username', $data['username'])->required()->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);
        if($validator->isSuccess()){
            $user = new User();
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if($insert){
                return View::redirect('login');
            }
        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $select = $privilege->Select();
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges' => $select]);
        }
    }

    // public function delete(){
    //     session_destroy();
    //     return View::redirect('login');
    // }
}