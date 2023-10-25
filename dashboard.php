<?php
    include("Config/config.php");

    $config = new Config;
    $object = $config->fetch();

    if(isset($_REQUEST['dlt_btn'])){
        $ID = $_REQUEST['delete_id'];

        $res = $config->delete($ID);

        if($res){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!!!!!! </strong> Your Record is Deleted SuccessFully...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!!!!!! </strong> Your Record Deletion failed...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

    if(isset($_REQUEST['edit_btn'])){
        $ID = $_REQUEST['edit_id'];

        $res = $config->fetch_single_record($ID);

        $single_data = mysqli_fetch_assoc($res);
    }

    if(isset($_REQUEST['update_btn'])){
        $ID = $_REQUEST['update_id'];
        $NAME = $_REQUEST['NAME'];
        $COURSE = $_REQUEST['COURSE'];
        $DATE_OF_BIRTH = $_REQUEST['DATE_OF_BIRTH'];

        $config->update($NAME,$COURSE,$DATE_OF_BIRTH,$ID);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>IndexPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="container pt-5">
        <div class ="col-6"> 
        <form action="" method="">
        <input type="hidden" class="form-control" name='update_id' value=<?php echo @$single_data['ID'];?>><br><br>
                Name : <input type="text" class="form-control" name='NAME' value=<?php echo @$single_data['NAME'];?>><br><br>
                COURSE : <input type="text" class="form-control" name='COURSE' value=<?php echo @$single_data['COURSE'];?>><br><br>
                DATE_OF_BIRTH : <input type="date" class="form-control" name='DATE_OF_BIRTH' value=<?php echo @$single_data['DATE_OF_BIRTH'];?>><br><br>
                <button type="btn" class="btn btn-success" name='update_btn'>UPDATE</button>
            </form>
</div>
<br>
<div class="col-6">
<table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">COURSE</th>
                        <th scope="col">DATE_OF_BIRTH</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($record = mysqli_fetch_assoc($object)){ ?>
                        <tr>
                        <td><?php echo $record['ID'];?></td>
                            <td><?php echo $record['NAME'];?></td>
                            <td><?php echo $record['COURSE'];?></td>
                            <td><?php echo $record['DATE_OF_BIRTH'];?></td>
                            <td>
                                <form action="" methods="">
                                    <input type="hidden" name="edit_id" value=<?php echo $record['ID'];?>>
                                    <button type='btn' class="btn btn-warning" name='edit_btn'>EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="" methods="">
                                    <input type="hidden" name="delete_id" value=<?php echo $record['ID'];?>>
                                    <button type='btn' class="btn btn-danger" name='dlt_btn'>DELETE</button>
                                </form>
                            </td>
                        </tr>
                    <?php };?>
                </tbody>
            </table>
</div>
            
        </div>
    </div>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>