<?php
    include 'connection.php';

    $description = $_POST['description'];
    $number = $_POST['number'];
    $status = $_POST['status'];
    $building = $_POST['building'];

    $res = mysqli_query($conn, "select id from building where name='$building'");
    $row = mysqli_fetch_assoc($res);
    $bulding_id = $row['id'];

    $nameimg = "flat/".$_POST['imagename'].".JPG";
    $image = $_POST['image'];

    $decodeimage = base64_decode($image);
    if(file_put_contents($nameimg,$decodeimage))
    {
        if(mysqli_query($conn, "insert into flat(building_id, flat_number, description, status, image)values('$bulding_id', '$number', '$description', '$status', '$nameimg')"))
        {
            $responce['success']=true;
            $responce['message']="Flat added successfully";
        }
        else
        {
            $responce['success']=false;
            $responce['message']="Unable to process your data";
        }
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Unable to send your data";
    }

    echo json_encode($responce);
?>