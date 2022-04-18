<?php
    include 'connection.php';

    $name = $_POST['name'];
    $number = $_POST['number'];
    $builder = $_POST['builder'];
    $address = $_POST['address'];

    if(mysqli_query($conn, "insert into building (name, builder_name, contact, address, status) values ('$name', '$builder', '$number', '$address', true)"))
    {
        $responce['success']=true;
        $responce['message']="Building added successfully..!";
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Ooops, Unable to add building..!";
    }

    echo json_encode($responce);
?>