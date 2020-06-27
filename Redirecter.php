<?php

$servername = "localhost";
$username = "root";
$password = "w7o8r9k$";
$dbname = "db1";
$table = "url";
$domain = "www.short/";

$gotourl = redir("https://short/a", $servername, $username, $password, $table, $dbname);

function shortURLtoID(string $shortURL)
{
    //echo nl2br("Getting ID\n");
    $id = 1;
    for($i=0; $i < strlen($shortURL); $i++)
    {
        if (ord('a') <= $shortURL[$i] && $shortURL[$i] <= ord('z')) 
          $id = $id*62 + $shortURL[$i] - ord('a'); 
        if (ord('A') <= $shortURL[$i] && $shortURL[$i] <= ord('Z') )
          $id = $id*62 + $shortURL[$i] - ord('A') + 26; 
        if (ord('0') <= $shortURL[$i] && $shortURL[$i] <= ord('9')) 
          $id = $id*62 + $shortURL[$i] - ord('0') + 52; 
    }
    //echo nl2br("ID is $id\n");
    return $id;
}

function redir(string $shortURL, $servername, $username, $password, $table, $dbname)
{
    //text processing to remove the domain name - for now, lets just strip the 1st few characters
    $id = shorturltoID(substr($shortURL, 10));
    
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo nl2br("Connected successfully\n");

    $conn -> select_db($dbname);

    $sql = "SELECT longurl FROM $table WHERE id = $id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);
    $res = $row[0];

    $conn->close();
    echo nl2br("$res\n");
    return $res;
}

?>  