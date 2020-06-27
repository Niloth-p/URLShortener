#### Improvements to be done:

* Even when all entries are deleted from table, the table still keeps auto-incrementing. The table has to be reseeded from 0 using DBCC CHECKIDENT (mytable, RESEED, 0), once it reaches its limit. 
* Add a check - if the user entered input is in fact an URL. If not, create an alert and ask the user to re-enter.
* Duplicated entries currently give an error, it should instead retrieve the other url from the table.
* Typing a new short URL that is not in the database currently generates an error, this needs to be handled with an alert to the user instead of echoing it.
* current_date and expiration_date columns could be added to keep removing entries as they expire.
* Develop a proper test suite for the project
* When displaying the shortened URL, it should be a hypertext that redirects to the original URL. 
