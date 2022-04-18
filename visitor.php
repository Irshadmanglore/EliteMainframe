<?php
    include 'connection.php';

    $name = $_POST['name'];
    $number = $_POST['number'];
    $purpose = $_POST['purpose'];
    $vehicle = $_POST['vehicle'];
    $building = $_POST['building'];
    $bulding_id = 1;

    $res = mysqli_query($conn, "select id from building where name='$building'");
    $row = mysqli_fetch_assoc($res);
    $bulding_id = $row['id'];

    $nameimg = "visitor/".$_POST['imagename'].".JPG";
    $image = $_POST['image'];

    $decodeimage = base64_decode($image);
    if(file_put_contents($nameimg,$decodeimage))
    {
        if(mysqli_query($conn, "insert into visitors(bulding_id, visitor_name, phone, purpose, vehicle_number, image, status)values('$bulding_id', '$name', '$number', '$purpose', '$vehicle', '$nameimg', true)"))
        {
            $responce['success']=true;
            $responce['message']="Visitor added successfully";
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