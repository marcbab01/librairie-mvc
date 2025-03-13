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
            $checkuser = $user->checkUser($data['username'], $data['password']);
            if($checkuser){
                return View::redirect('membres');
            }else{
                $errors['message'] = "SVP! Vérifier vos informations";
                // print_r();
                return View::render('auth/index', ['errors'=>$errors, 'user'=>$data]);
            }
        }else{
            $errors = $validator->getErrors();

            return View::render('auth/index', ['errors'=>$errors, 'user'=>$data]);
        }
    }

    public function delete(){
        session_destroy();
        return View::redirect('login');
    }
}