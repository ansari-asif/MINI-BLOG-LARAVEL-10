<?php
namespace App\Gates;

class AdminGate
{
    public function checkAdmin($user){
        if($user->email=="admin@gmail.com"){
            return true;
        }else{
            return false;
        }   
    }    
}




?>