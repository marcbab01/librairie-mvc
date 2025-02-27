<?php
namespace App\controllers;
use App\Models\Livre;
use App\Providers\View;
use App\Providers\Validator;

class ClientController {

    public function index() {
        $livre = new Livre;
        $select = $livre->select('titre');
        include('views/livre/index.php');
        return View::render('livre/index', ['livres' => $select]);
    }

    public function create(){
        return View::render('livre/create');
    }

    public function show($data=[]){
        if(isset($data['id'])&& $data['id']!=null){
            $livre = new Livre;
            if($selectId = $livre->selectId($data['id'])){
                return View::render('livre/show', ['livre'=>$selectId]);
            }else{
                return View::render('error', ['msg'=>'Ce livre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function store($data=[]){
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->max(255);
        $validator->field('auteur', $data['auteur'])->max(45);
        $validator->field('categorie', $data['categorie_id'])->number();
        $validator->field('anneePublication', $data['anneePublication'])->required()->number()->max(4);

        if($validator->isSuccess()){
            $livre = new Livre;
            $insert = $livre->insert($data);
            if($insert){
                 return view::redirect('livre/show?id='.$insert);
            }else{
             return View::render('error');
            }
        }else{
            $errors = $validator->getErrors();
            return View::render('livre/create', ['errors'=>$errors, 'livre'=>$data]);
        }
    }

    public function edit($data=[]){
        if(isset($data['id'])&& $data['id']!=null){
            $livre = new Livre;
            if($selectId = $livre->selectId($data['id'])){
                return View::render('livre/edit', ['livre'=>$selectId]);
            }else{
                return View::render('error', ['msg'=>'Ce Livre n existe pas']);
            }
            
        }
        return View::render('error');
    }

    public function update($data=[], $get=[]){
        $validator = new Validator;
        $validator->field('titre', $data['titre'])->max(255);
        $validator->field('auteur', $data['auteur'])->max(45);
        $validator->field('categorie', $data['categorie_id'])->number();
        $validator->field('anneePublication', $data['anneePublication'])->required()->number()->max(4);

        if($validator->isSuccess()){
               $livre = new Livre;
               $update = $livre->update($data, $get['id']);
                if($update){
                    return view::redirect('livre/show?id='.$get['id']);
                }else{
                    return View::render('error');
                }
        }else{
            $errors = $validator->getErrors();
            return View::render('livre/edit', ['errors'=>$errors, 'livre'=>$data]);
        }

    }

    public function delete($data=[]){
        $id = $data['id'];
        $livre = new Livre;
        $delete = $livre->delete($id);
        if($delete){
            return view::redirect('livres');
        }else{
            return View::render('error');
        }
    }

}