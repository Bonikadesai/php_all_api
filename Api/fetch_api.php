<?php
    include("../Config/config.php");
    header("Access-Control-Allow-Methods: GET");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=="GET"){
        $obj = $config->fetch();
        $all_data = [];

        while($record = mysqli_fetch_assoc($obj)){
            array_push($all_data,$record);
        }
        $arr['Students'] = $all_data;
    }else{
        $arr['error'] = "Only GET HTTP Methods are Allowed...";
    }

    echo json_encode($arr);
?>