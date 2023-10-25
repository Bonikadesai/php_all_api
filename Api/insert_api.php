<?php 
    header("Access-ControlP-Allow-Methods: POST");

    include("../Config/config.php");
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $NAME = $_POST['NAME'];
        $COURSE = $_POST['COURSE'];
        $DATE_OF_BIRTH = $_POST['DATE_OF_BIRTH'];
        $res = $config->insert($NAME,$COURSE,$DATE_OF_BIRTH);

        if($res){
            $arr['data'] = "Record Inserted Success.....";
        }else{
            $arr['data'] = "Record Insertion Failed....";
        }
    }else{
        $arr['error'] = "Only POST HTTP Methods are Allowed....";
    }

    echo json_encode($arr);
?>