<?php
/**
 * Created by IntelliJ IDEA.
 * User: sohail.alam
 * Date: 1/4/14
 * Time: 5:27 PM
 */
include_once "../library/php/MongoCrud.php";

/* Parse the POST request to get the book information */
$value_bookTitle = $_POST['bookTitle'];
$value_bookAuthors = $_POST['bookAuthors'];
$value_bookEdition = $_POST['bookEdition'];
$value_bookPublishedOn = $_POST['bookPublishedOn'];
$value_bookLanguage = $_POST['bookLanguage'];
$value_bookPublisher = $_POST['bookPublisher'];
$value_bookIsbn = $_POST['bookIsbn'];
$value_bookDescription = $_POST['bookDescription'];
$value_bookCover = $_POST['bookCover'];

/* Create an array with the above information which will be inserted into MongoDB */
$data = array(
    "bookTitle" => $value_bookTitle,
    "bookAuthors" => $value_bookAuthors,
    "bookEdition" => intval($value_bookEdition),
    "bookPublishedOn" => intval($value_bookPublishedOn),
    "bookLanguage" => $value_bookLanguage,
    "bookPublisher" => $value_bookPublisher,
    "bookIsbn" => $value_bookIsbn,
    "bookDescription" => $value_bookDescription,
    "bookCover" => $value_bookCover
);

/* Connect to MongoDB Database */
$mongoCrud = new MongoCrud("test", 'test_col');
/* Insert the data - On success it will return an ID, and on failure it will return a failure message */
$_id = $mongoCrud->insert($data);

/* Search the database for all books having the same title */
$searchQuery = array(
    'bookTitle' => $value_bookTitle
);
$fields = array('_id', 'bookTitle', 'bookAuthors');
$cursor = $mongoCrud->find($searchQuery, $fields);
$foundBooksCount = $cursor->count();

/*
 * Now set the appropriate HTTP Headers, this way we can return the _id and the number of
 * books having the same title. The JavaScript will look inside these headers, and
 * take the appropriate actions.
 */
header('X-ID: ' . $_id);
header('X-FOUND-BOOKS: ' . $foundBooksCount);

/* Finally do a var_dump of the POST request that was received by the PHP server */
var_dump($_POST);
