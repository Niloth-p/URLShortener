## URLShortener
A URL Shortener with a webpage UI providing 2 options:
1. The user can enter a URL to get a shortened URL.
2. The user can enter a shortened URL to get the link for the original URL.

#### Tech Stack
This project uses HTML, PHP, AJAX, MySQL.

#### DEMO images
See imgs folder in the sequence given.

#### Table
columns:
* ID - auto incrementing primary key 
* longurl - varchar of max size
* shorturl - varchar of max size

#### Files:
Shortener.php
Redirecter.php

### Functions:
1. **shortener**(string $**longurl**, $servername, $username, $password, $table, $dbname, $domain)
    * returns a shortened URL given a URL
2. **insert_long**(string $**longurl**, $servername, $username, $password, $table, $dbname)
    * inserts the URL as a new entry in the DB
3. **insert_short**(string $**shorturl**, int $**id**, $servername, $username, $password, $table, $dbname)
    * inserts the shortened URL corresponding to the ID
4. **idToShortURL**(int $**n**, $domain)
    * converts the ID to the shortest possible URL by base conversion from 10 to 62
5. **redir**(string $**shortURL**, $servername, $username, $password, $table, $dbname)
    * returns the original URL of the shortened URL
6. **shortURLtoID**(string $**shortURL**)
    * generates the ID back from the shortened URL using base conversion from 62 to 10 

### UI:
1. Shorten URL : 1 textbox + 1 button + 1 div
2. Redirect to URL : 1 textbox + 1 button + 1 div

### Flow:
1. Shorten URL:
    * *Get the long URL from the user*
    * *Using AJAX, POST it to Shortener.php*
    * *Shortener() calls insert_long() to insert new row in DB & returns ID*
    * *Shortener() calls idToShortURL() to create short URL from ID*
    * *Shortener() calls insert_short() to insert short URL to DB*
    * *Shortener() returns short URL to the front end & it is displayed*
2. Get original link:
    * *Get the shortened URL from the user*
    * *Using AJAX, POST it to Redirecter.php*
    * *redir() gets the shorturl's hash from shorturl*
    * *redir() calls shorturltoID() to get the ID*
    * *redir() gets the long original URL from the DB*
    * *redir() returns it to the front end & the hyerlink is displayed*

#### Algorithm Reference
* https://medium.com/swlh/how-to-build-a-tiny-url-service-that-scales-to-billions-f6fb5ea22e8c
* https://www.geeksforgeeks.org/how-to-design-a-tiny-url-or-url-shortener/
