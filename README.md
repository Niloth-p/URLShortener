# URLShortener

1 DB:
columns:ID, longurl, shorturl

Files:
Shortener.php
Redirecter.php

Functions:
shortener(string $longurl, $servername, $username, $password, $table, $dbname, $domain)
insert_long(string $longurl, $servername, $username, $password, $table, $dbname)
insert_short(string $shorturl, int $id, $servername, $username, $password, $table, $dbname)
idToShortURL(int $n, $domain)
redir(string $shortURL, $servername, $username, $password, $table, $dbname)
shortURLtoID(string $shortURL)

UI:



Flow:

UI: Option1 - long url - call stol()
stol() to Insertl()
Insertl() to DB : creates a new row w. long url - returns the id to stol()
stol() calls idToShortURL()
idToShortURL(): ID -> base conversion -> short url
stol() to Insertsh()
Insertsh() to DB : Stores short url to DB
stol() returns short url to UI

UI: Option2 - short url - call redir()
redir() - get shorturl's hash from shorturl, call shorturltoID()
shorturltoID() - shorturl -> ID
redir() - get longurl from DB1, redirect html page - open in new tab
