<?php
namespace App\controllers;
use App\Models\Membre;
use App\Providers\View;
use App\Providers\Validator;

class ClientController {

    public function index() {
        $membre = new Membre;
        $select = $membre->select('fname');
        include('views/membre/index.php');
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
            }else{
                return View::render('error', ['msg'=>'Ce membre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function store($data=[]){
        $validator = new Validator;
        $validator->field('lname', $data['lname'])->max(25);
        $validator->field('fname', $data['fname'])->max(45);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('email', $data['email'])->required()->max(45)->email();

        if($validator->isSuccess()){
            $membre = new Membre;
            $insert = $membre->insert($data);
            if($insert){
                 return view::redirect('membre/show?id='.$insert);
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
            $client = new Membre;
            if($selectId = $membre->selectId($data['id'])){
                return View::render('membre/edit', ['membre'=>$selectId]);
            }else{
                return View::render('error', ['msg'=>'Ce membre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function update($data=[], $get=[]){
        $validator = new Validator;
        $validator->field('lname', $data['lname'])->max(25);
        $validator->field('fname', $data['fname'])->max(45);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('email', $data['email'])->required()->max(45)->email();

        if($validator->isSuccess()){
               $membre = new Membre;
               $update = $membre->update($data, $get['id']);
                if($update){
                    return view::redirect('membre/show?id='.$get['id']);
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
            return view::redirect('membres');
        }else{
            return View::render('error');
        }
    }

}