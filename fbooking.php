<?php

include 'connection.php';
$response=array();

$userid = $_POST['userid'];

$qry = "select flat.flat_number, flat.image, user.name, booking.booking_date, booking.to_date, booking.from_date from booking join user on user.id = booking.user_id join flat on flat.id = booking.building_id where booking.booking_type = 'Hall' and booking.user_id = '$userid' order by booking.id desc";
$res = mysqli_query($conn, $qry);
if(mysqli_num_rows($res)>0)
{
    while($rows = mysqli_fetch_assoc($res))
    {
        $send["flatnumber"] = $rows['flat_number'];
        $send["image"] = $rows['image'];
        $send["username"] = $rows['name'];
        $send["bookingdate"] = $rows['booking_date'];
        $send["todate"] = $rows['to_date'];
        $send["fromdate"] = $rows['from_date'];

        array_push($response,$send);
    }
}
else
{
    $response=null;
}  
echo (json_encode($response));
?>