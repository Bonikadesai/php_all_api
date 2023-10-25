<?php

    include("Config/config.php");
    $config = new Config();

    $response=$config->connect();

    if(isset($_REQUEST['button'])){
        $NAME = @$_REQUEST['NAME'];
        $COURSE = @$_REQUEST['COURSE'];
        $DATE_OF_BIRTH = @$_REQUEST['DATE_OF_BIRTH'];

        $res = $config->insert ($NAME,$COURSE,$DATE_OF_BIRTH);

        header("Location: dashboard.php");

        if($res){
            echo "Record Inserted Successsfully......";
        }else{
            echo "Record Insertion is failed......";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>IndexPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="d-flex justify-content-center">
        <div class ="col-6"> 
            <form action="index.php" method="">
                Name : <input type="text" class="form-control" name='NAME'><br><br>
                COURSE : <input type="text" class="form-control" name='COURSE'><br><br>
                DATE_OF_BIRTH : <input type="date" class="form-control" name='DATE_OF_BIRTH'><br><br>
                <button type="btn" class="btn btn-info" name='button'>SUBMIT</button>
            </form>
        </div>
    </div>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>