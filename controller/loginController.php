<?php
class loginController extends login
{
    public function loginUsersLoginController(){
        $data = $_POST['inpUserLoginAdmin'];
        foreach (parent::loginUsers($data) as $resultLoginUser){}
        if($data === @$resultLoginUser->ADMIN_NICKNAME && $_POST['inpPassLoginAdmin'] === @$resultLoginUser->ADMIN_PASS){
            security::datesAdmin($resultLoginUser->ADMIN_NAME, $resultLoginUser->ADMIN_LASTNAME, $resultLoginUser->ADMIN_MAIL);
            header('location:?c=index&m=insertions');
        } else {
            ?>
            <script>
                window.location = 'http://localhost/Proyects/MultimeterSena/';
            </script>
            <?php
        }
    }

    public function destroySession(){
        session_destroy();
        header('location:http://localhost/Proyects/MultimeterSena/');
    }


}