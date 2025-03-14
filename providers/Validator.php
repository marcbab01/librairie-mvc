<?php
namespace App\Providers;
use App\Models;

class Validator{

    private $errors = array();
    private $key;
    private $value;
    private $name;

    public function field($key, $value, $name = null){
        $this->key = $key;
        $this->value = $value;
        if($name == null){
            $this->name = ucfirst($key);
        }else{
            $this->name = ucfirst($name);
        }
        return $this;
    }

    public function required(){
        if(empty($this->value)){
            $this->errors[$this->key]="$this->name est requis";
        }
        return $this;
    }

    public function max($length){
        if(strlen($this->value) > $length ){
            $this->errors[$this->key]="$this->name doit avoir $length caracteres maximum!";
        }
        return $this;
    }

    public function min($length){
        if(strlen($this->value) < $length ){
            $this->errors[$this->key]="$this->name doit avoir $length caracteres minimum!";
        }
        return $this;
    }

    public function number(){
        if(!empty($this->value) && !is_numeric($this->value)){
            $this->errors[$this->key]="$this->name doit être un nombre";
        }
        return $this;	    
    }

    public function email(){
        if(!empty($this->value) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)){  
            $this->errors[$this->key]="$this->name est invalide!";
        }
        return $this;	    
    }

    public function isSuccess(){
        if(empty($this->errors)) return true;
    }

    public function getErrors(){
        if(!$this->isSuccess()) return $this->errors;
    }

    public function unique($model) {
        $model = 'App\\Models\\'.$model;
        $model = new $model;
        $unique = $model->unique($this->key, $this->value);
        if ($unique) {
            $this->errors[$this->key]="$this->name existe déjà.";
        }
        return $this; 
    }

}