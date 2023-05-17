<?php
require_once("../../Models/UserModel.php");
//session_start();
class UserController
{
    public $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function invoke()
    {
        if (isset($_POST['submitLogin'])) {

            if ($this->model->login($_POST['username'], $_POST['password']) == true) {

                if ($_POST['username'] == 'admin') {

                    $users =  $this->model->getUserList();
                    header("Location: ../admin/customers.php");
                } else {

                    $_SESSION['username'] = $_POST['username'];
                    header("Location: ../users/home.php");
                }
            } else {
               header("Location: ../users/signin.php?msg=false");
            }
        } else {
        }
      
    }
}
