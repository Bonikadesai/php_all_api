<?php
    include("../Config/user_config.php");
    header("Access-Control-Allow-Methods: DELETE");

    $config = new User_Config();

    if($_SERVER['REQUEST_METHOD']=="DELETE"){

        $input = file_get_contents("php://input"); //return String Data
        parse_str($input,$_DELETE);
        $id = $_DELETE['id'];

        $res = $config->delete_image($id);
        if($res){
            $arr['status'] = "Delete Image Success...";
        }else{
            $arr['status'] = "Deletion Failed...";
        }
    }else{
        $arr['error'] = "Only DELETE HTTP Method are Allowed...";
    }

    echo json_encode($arr);
?>