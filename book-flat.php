<?php
    include 'connection.php';

    $user = $_POST['user'];
    $building = $_POST['building'];
    $type = $_POST['type'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];

    // $user = "fdg";
    // $building = "fdg";
    // $type = "fdg";
    // $fromdate = "2021-06-12";
    // $todate = "2021-06-12";

    $res = mysqli_query($conn, "select id from flat where flat_number='$building'");
    $row = mysqli_fetch_assoc($res);
    $bulding_id = $row['id'];

    $res2 = mysqli_query($conn, "select id from user where name='$user'");
    $row2 = mysqli_fetch_assoc($res2);
    $user_id = $row2['id'];

   
    if(mysqli_query($conn, "insert into booking(user_id, building_id, from_date, to_date, booking_type)values('$user_id', '$bulding_id', '$fromdate', '$todate', '$type')"))
    {
        $responce['success']=true;
        $responce['message']="Booking success";
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Unable to process your data";
    }

    echo json_encode($responce);
?>