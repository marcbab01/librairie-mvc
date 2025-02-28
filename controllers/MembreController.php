<?php
namespace App\controllers;
use App\Models\Membre;
use App\Providers\View;
use App\Providers\Validator;

class MembreController {

    public function index() {
        $membre = new Membre;
        $select = $membre->select('id');
        return View::render('membre/index', ['membres' => $select]);
    }

    public function create(){
        return View::render('membre/create');
    }

    public function show($data=[]){
        if(isset($data['id'])&& $data['id']!=null){
            $membre = new Membre;
            if($selectId = $membre->selectId($data['id'])){
                return View::render('membre/show', ['membre'=>$selectId]);
            } else {
                return View::render('error', ['msg'=>'Ce membre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function store($data=[]){

        $fname = isset($data['fName']) ? $data['fName'] : null;
        $lname = isset($data['lName']) ? $data['lName'] : null;
        $phone = isset($data['phone']) ? $data['phone'] : null;
        $email = isset($data['email']) ? $data['email'] : null;

        $validator = new Validator;
        $validator->field('lName', $data['lName'])->min(3)->max(25);
        $validator->field('fName', $data['fName'])->min(3)->max(45);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('email', $data['email'])->required()->max(45)->email();

        if($validator->isSuccess()){
            $membre = new Membre;
            $insert = $membre->insert($data);
            if($insert){
                 return View::redirect('membre/show?id='.$insert);
            }else{
             return View::render('error');
            }
        }else{
            $errors = $validator->getErrors();
            return View::render('membre/create', ['errors'=>$errors, 'membre'=>$data]);
        }
    }

    public function edit($data=[]){
        if(isset($data['id'])&& $data['id']!=null){
            $membre = new Membre;
            if($selectId = $membre->selectId($data['id'])){
                return View::render('membre/edit', ['membre'=>$selectId]);
            }else{
                return View::render('error', ['msg'=>'Ce membre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function update($data=[], $get=[]){
        $fname = isset($data['fName']) ? $data['fName'] : null;
        $lname = isset($data['lName']) ? $data['lName'] : null;
        $phone = isset($data['phone']) ? $data['phone'] : null;
        $email = isset($data['email']) ? $data['email'] : null;

        $validator = new Validator;
        $validator->field('lName', $data['lName'])->min(3)->max(25);
        $validator->field('fName', $data['fName'])->min(3)->max(45);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('email', $data['email'])->required()->max(45)->email();

        if($validator->isSuccess()){
               $membre = new Membre;
               $update = $membre->update($data, $get['id']);
                if($update){
                    return View::redirect('membre/show?id='.$get['id']);
                }else{
                    return View::render('error');
                }
        }else{
            $errors = $validator->getErrors();
            return View::render('membre/edit', ['errors'=>$errors, 'membre'=>$data]);
        }

    }

    public function delete($data=[]){
        $id = $data['id'];
        $membre = new Membre;
        $delete = $membre->delete($id);
        if($delete){
            return View::redirect('membres');
        }else{
            return View::render('error');
        }
    }

}