<?php
    
    require_once 'Const.php';
    // 人間の設計図
    class Human{
        public $name;
        public $age;
        
        public function __construct($name, $age){
            $this->name = $name;
            $this->age = $age;
        }
        
        public function drink(){
            if($this->age >= 20){
                return "お酒をお楽しみください";
            }else{
                return "お酒は20歳から。あと" . (20 - $this->age) . "年お待ちください";
            }
        }
        
        public function drive(){
            if($this->age >= 18){
                return "ドライブをお楽しみください";
            }else{
                return "ドライブは18歳から。あと" . (18 - $this->age) . "年お待ちください";
            }
        }
        
        public function validate(){
            $errors = array();
            
            if($this->name === ''){
                $errors[] = "お名前を入力ください";
            }
            
            if($this->age === ''){
                $errors[] = "年齢を入力ください";
            }else if(preg_match('/^[0-9]+$/', $this->age) === 0){
                $errors[] = "年齢を0以上の整数で入力してください";
            }
            
            return $errors;
        }
    }