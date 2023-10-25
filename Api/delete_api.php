<?php
    include("../Config/config.php");
    header("Access-Control-Allow-Methods: DELETE");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=="DELETE"){

        $input = file_get_contents("php://input"); //return String Data
        parse_str($input,$_DELETE);
        $ID = $_DELETE['ID'];

        $res = $config->delete($ID);
        if($res){
            $arr['status'] = "Record Delete Success...";
        }else{
            $arr['status'] = "Record Deletion Failed...";
        }
    }else{
        $arr['error'] = "Only DELETE HTTP Method are Allowed...";
    }

    echo json_encode($arr);
?>