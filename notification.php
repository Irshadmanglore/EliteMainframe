<?php

$uid = $_POST['uid'];

include 'connection.php';
$response=array();

$qry = "select * from notification where user_id = '$uid'";
$res = mysqli_query($conn, $qry);
if(mysqli_num_rows($res)>0)
{
    while($rows = mysqli_fetch_assoc($res))
    {
        $send["date"] = $rows['created_date'];
        $send["title"] = $rows['title'];
        $send["description"] = $rows['description'];

        array_push($response,$send);
    }
}
else
{
    $response=null;
}  
echo (json_encode($response));
?>