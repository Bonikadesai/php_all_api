<?php
    include("../Config/user_config.php");
    header("Access-Control-Allow-Methods: POST");

    $config = new User_Config();

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $res = $config->sign_in($email,$password);
        if($res){
            $arr['data'] = "User Sign in Success...";
        }else{
            $arr['data'] = "User Sign in Failed...";
        }
    }else{
        $arr['error'] = "Only POST HTTP Methods are Alloewd...";
    }

    echo json_encode($arr);
?>