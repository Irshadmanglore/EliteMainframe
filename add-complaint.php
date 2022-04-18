<?php
    include 'connection.php';

    $uid = $_POST['uid'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    if(mysqli_query($conn, "insert into complaints (user_id, title, description, status) values ('$uid', '$title', '$desc', true)"))
    {
        $responce['success']=true;
        $responce['message']="Your complaint has been submitted successfully..!";
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Ooops, Unable to send your data..!";
    }

    echo json_encode($responce);
?>