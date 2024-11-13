<?php
namespace App\Libraries;

class CIAuth{
    public static function setCIAuth($result){
        $session = session();
        $array = ['logged_in'=>true];
        $admindata = $result;
        $session->set('admindata', $admindata);
        $session->set($array);
    }
    public static function id(){
        $session = session();
        if($session->has('logged_in')){
           
          if($session->has('admin')){
            
            return $session->get('admindata')['id'];

          }else{
            return null;
          }

        }else{
            return null;
        }
    }


    public static function check(){
        $session = session();
        return $session->has('logged_in');
    }

    public static function forget(){
        $session = session();
        $session->remove('logged_in');
        $session->remove('admindata');
    }

    public static function admin(){
        $session = session();
        if($session->has('logged_in')){
          if($session->has('admindata')){
             return $session->get('admindata');
          }else{
            return null;
          }
        }else{
            return null;
        }
    }
}