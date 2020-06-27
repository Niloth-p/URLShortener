<?php

$servername = "localhost";
$username = "root";
$password = "w7o8r9k$";
$dbname = "db1";
$table = "url";
$domain = "www.short/";

// item1 = $_GET['longurl'];
// echo $item1;

$longurl = $_REQUEST['longurl'];
//echo 'longurl- '.$url;


//$newurl = shortener("www.mysite.com/legal/online/make-sure-you-are-charging-sales-tax", $servername, $username, $password, $table, $dbname, $domain);
$newurl = shortener($longurl, $servername, $username, $password, $table, $dbname, $domain);
echo $newurl;

function shortener(string $longurl, $servername, $username, $password, $table, $dbname, $domain)
{
    //echo nl2br("Began shortener\n");
    $id = insert_long($longurl, $servername, $username, $password, $table, $dbname);
    $shorturl = idToShortURL($id, $domain);
    insert_short($shorturl, $id, $servername, $username, $password, $table, $dbname);
    return $shorturl;
}


function insert_long(string $longurl, $servername, $username, $password, $table, $dbname)
{    
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo nl2br("Connected successfully\n");

    $conn -> select_db($dbname);

    $sql = "INSERT INTO $table (longurl) VALUES ('$longurl')";
    if ($conn->query($sql) === TRUE) {
      //echo nl2br("New record created successfully\n");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT id FROM $table WHERE longurl = '$longurl'";
    $result = $conn->query($sql);
    $row = $result -> fetch_array(MYSQLI_NUM);
    $res = $row[0];
    //echo nl2br("$res\n");

    $conn->close();
    return $res;
}

function insert_short(string $shorturl, int $id, $servername, $username, $password, $table, $dbname)
{
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo nl2br("Connected successfully\n");

    $conn -> select_db($dbname);

    $sql = "UPDATE $table SET shorturl = '$shorturl' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
      //echo nl2br("Updated record successfully\n");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


function idToShortURL(int $n, $domain)
{
    //echo nl2br("Shortening\n");
    $map = (" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"); 
    $shorturl = "";
    while($n != 0)
    {
        $shorturl .= $map[$n%62];
        $n = $n/62;
    }
    strrev($shorturl);
    $shorturl = $domain.$shorturl;
    //echo nl2br("$shorturl\n");
    return $shorturl;
}

?>