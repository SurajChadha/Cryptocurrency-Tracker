<?php
$servername="localhost";
$username="root";
$password="";
$dbname="line";

$conn=new mysqli("$servername","$username","$password","$dbname");

if($conn){

}else{
    echo "Connection Failed";
}
?>