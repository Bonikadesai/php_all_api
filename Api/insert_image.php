<?php
    include("../Config/user_config.php");
    header("Access-Control-Allow-Methods: POST");

    $config = new User_Config();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_FILES['fname']['name'];
        $path = $_FILES['fname']['tmp_name'];
        $destintion = "../uploads/" .$name;
        $isUploaded = move_uploaded_file($path,$destintion);

        if($isUploaded){
            $res = $config->insert_image($name,$path);

            if($res){
                $arr['data'] = "Successfull image insert...";
            }else{
                $arr['data'] = "Failed image insert....";
            }
        }else{
            $arr['error'] = "Uploadation Failed...";
        }
    }else{
        $arr['error'] = "Only POST HTTP Methods are Allowed...";
    }

    echo json_encode($arr);
?>