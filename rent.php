<?php
    include 'connection.php';

    $uid = $_POST['uid'];
    $month = $_POST['month'];
    $pno = "PAY".rand(10000, 99999);
    $year = date("Y");

    if(mysqli_query($conn, "insert into rent (user_id, month, year, amount,status, payment_number) values ('$uid', '$month', '$year', '5500', true, '$pno')"))
    {
        $responce['success']=true;
        $responce['message']="Your rent has been submitted successfully..!";
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Ooops, Unable to send your data..!";
    }

    echo json_encode($responce);
?>