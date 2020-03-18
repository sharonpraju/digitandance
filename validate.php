<?php
include 'db_connection.php';
$conn = OpenCon();
session_start();
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$validation=$_POST['validation'];
if($validation==1)
{
    $x=get_client_ip();
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $sql = "SELECT * FROM admin_config where staff_id = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['staff_pass']==$pass AND $row['status']==1 AND $row['device_ip']=="$x")
    {
        $_SESSION['admin']=$row['staff_id'];
        echo "1";
    }
    else
    {
        echo"0";
    }
}

CloseCon($conn);

?>