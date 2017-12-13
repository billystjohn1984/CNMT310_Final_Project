# CNMT 310: Production Programming
This is the final version of a web application written for CNMT310: Production Programming by Leo Skadden, Riley Pankratz, and Bill St. John. This project has been finished in 5 sprints over the course of Fall semester 2017 at University of Wisconsin - Stevens Point.

-----------------

## Overview
The main object of the project was to "develop a web-based music entry application with a database backend." This was achieved using PHP and MySQL. The repository is split into two parts SQL and Web. Web has php, html, css, and javascript files that need to be uploaded to the server. SQL has the scripts that we used to create our database and the statements we execute to read and update the database.

### PHP
The main page that we worked with was playlistPage.php. It is the page that displays the playlist and allows DJs to enter new songs into the playlist. This page demonstrates many of the features that we made for our main PHP classes, BetterPage.php and Form.php. All of the html is created and added to one of three private variables that are printed when the page has been fully constructed. The following is a brief walkthrough of some of those features.

#### Feautres
```php
$page->setDefaultTop();

$page->startWrapper();
$page->setHeader();
$page->startMain();
```
These methods are 'containers' for some static html that needs to be generated to work with the css that we were given. This is a common practice we used to keep the page generation files more readable and to ease any updates that may come down the road. All of these 'container' methods are in the BetterPage class.
```php
	$page->startForm("submit.php")
		->setMiddle("<select>")
		->createOption("Placeholder")
		->setMiddle("</select>")
		->createInput("Song Title")
		->createInput("Artist")
		->createInput("Album")
		->createInput("Label")
		->createSubmit()
		->endForm();
```
To start with this snippet shows method chaining or "Fluent Interfaces", each of these methods return the object they are acting upon so you only have to call the variable (`$page` in this case) once. The snippet also shows how subclasses of BetterPage work, they offer a very specific set methods that provide extra functionality. In this case we have another 'container' type method, `startForm()`, which is passed the action for the form and the *starting* form tag is added to the body variable of the page. This also shows the final type of method we used. `createInput` generates an entire input from the passed in ID and adds the html to the body variable.
```php
$page->endMain();
$page->setBottom();
print($page->getPage());
```
Finally we have the end of the css wrappers and the print statement. The `getPage()` method calls all of the getters for BetterPage, concatonates the values and returns them.

### SQL
The SQL section of the project is relativly simple. There's a script with all of the table creation commands we used, a script with generic insert statements for updating the tables from php, and two views that make retriving a pretty playlist easier in an admittedly over normalized database.