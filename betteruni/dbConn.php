<?php

$db = mysqli_connect("localhost","root","","betteruni");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>