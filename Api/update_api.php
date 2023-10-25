<?php
    include("../Config/config.php");
    header("Access-Control-Allow-Methods: PUT");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT"){

        $input = file_get_contents("php://input");
        parse_str($input,$_UPDATE);

        $ID = $_UPDATE['ID'];
        $NAME = $_UPDATE['NAME'];
        $COURSE = $_UPDATE['COURSE'];
        $DATE_OF_BIRTH = $_UPDATE['DATE_OF_BIRTH'];

        $res = $config->update($NAME,$COURSE,$DATE_OF_BIRTH,$ID);

        if($res){
            $arr['data'] = "Data Updated Success....";
        }else{
            $arr['data'] = "Data Updation Failed...."; 
        }

    }else{
        $arr[error] = "Only PUT HTTP Methods are Allowed........";
    }

    echo json_encode($arr);
?>