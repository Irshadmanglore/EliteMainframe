<?php
    include 'connection.php';

    $uid = $_POST['uid'];
    // $uid = "1";

    $res = mysqli_query($conn, "select * from user where id = '$uid' and status = true");
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_assoc($res);
        $responce['uid']=$row['id'];
        $responce['date']=$row['created_date'];
        $responce['name']=$row['name'];
        $responce['number']=$row['contact'];
        $responce['email']=$row['email'];
        if($row['status']){
            $responce['status']="Active";
        }
        else {
            $responce['status']="In-Active";
        }
        
        $responce['success']=true;
        $responce['message']="Your data fetched successfully..!";
       
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Unable to fetch your data..!";
    }

    echo json_encode($responce);
?>