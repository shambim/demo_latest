<?php
include('autoload.inc.php');
if(isset($_REQUEST['register_user'])){
    $name=(isset($_REQUEST['name'])&&$_REQUEST['name']!='')?$_REQUEST['name']:'';
    $email=(isset($_REQUEST['email'])&&$_REQUEST['email']!='')?$_REQUEST['email']:'';
    $password=(isset($_REQUEST['password'])&&$_REQUEST['password']!='')?password_hash($_REQUEST['password'],PASSWORD_DEFAULT):'';

    if(isset($_FILES['profile']['tmp_name'])){
        $profile=basename($_FILES['profile']['name']);
        move_uploaded_file($_FILES['profile']['tmp_name'],BASE_PATH.'assets/uploads/'.$profile);
    }
    $user=new User();
    
    $ins_det=$user->setUser($name,$email,$password,$profile);
    if($ins_det['status']=='success'){
        header('location:'.BASE_URL.'dashboad.php?msg=inserted');
    }else header('location:'.BASE_URL.'dashboad.php?msg=not_inserted');
}
