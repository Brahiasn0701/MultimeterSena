<?php
class security
{
    public static function datesAdmin($name, $lastname, $mail){
        $_SESSION['NAME'] = $name;
        $_SESSION['LASTNAME'] = $lastname;
        $_SESSION['MAIL'] = $mail;
    }

    public static function validateSession(){
        if(isset($_SESSION['NAME'])){

        } else {
            header('location:https://multimetrosceet.000webhostapp.com/');
        }
    }
}