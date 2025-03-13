<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController {

    public function __construct() {
        Auth::session();
        Auth::privilege(1);
    }

    public function create() {
        $privilege = new Privilege;
        $select = $privilege->select();
        return View::render('user/create', ['privileges'=>$select]);
    }

    public function store($data = []) {
        $validator = new Validator;
        $validator->field('lName', $data['lName'])->min(2)->max(50);
        $validator->field('fName', $data['fName'])->min(2)->max(50);
        $validator->field('username', $data['username'])->unique('User')->min(2)->max(50);
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('email', $data['email'])->required()->email()->max(100);
        $validator->field('privile_id', $data['privilege_id'])->required()->int();

        if($validator->isSuccess()){

            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if($insert){
                return View::redirect('login');
            }else{
                return View::render('error');
            }
        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data, 'privileges'=>$privileges]);
        }
    }
}