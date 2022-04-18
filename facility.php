<?php
    include 'connection.php';

    $building = $_POST['building'];
    $facility = $_POST['facility'];
    $description = $_POST['description'];
    
    $bulding_id = 1;
    $res = mysqli_query($conn, "select id from building where name='$building'");
    $row = mysqli_fetch_assoc($res);
    $bulding_id = $row['id'];

    if(mysqli_query($conn, "insert into facility (building_id, facility, description, status) values ('$bulding_id', '$facility', '$description', true)"))
    {
        $responce['success']=true;
        $responce['message']="Facility added successfully..!";
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Ooops, Unable to add facility..!";
    }

    echo json_encode($responce);
?>