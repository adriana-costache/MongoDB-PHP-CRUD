<?php
/**
 * Created by IntelliJ IDEA.
 * User: sohail.alam
 * Date: 3/4/14
 * Time: 1:27 PM
 */
include_once "../library/php/MongoCrud.php";

/* Create an array with the above information which will be inserted into MongoDB */
$query = array();
if (isset($_POST['bookTitle'])) {
    $value = $_POST['bookTitle'];
    if ($value != "") {
        $query['bookTitle'] = $value;
    }
}
if (isset($_POST['bookAuthors'])) {
    $value = $_POST['bookAuthors'];
    if ($value != "") {
        $query['bookAuthors'] = $value;
    }
}
if (isset($_POST['bookEdition'])) {
    $value = $_POST['bookEdition'];
    if ($value != "") {
        $query['bookEdition'] = $value;
    }
}
if (isset($_POST['bookPublishedOn'])) {
    $value = $_POST['bookPublishedOn'];
    if ($value != "") {
        $query['bookPublishedOn'] = $value;
    }
}
if (isset($_POST['bookLanguage'])) {
    $value = $_POST['bookLanguage'];
    if ($value != "") {
        $query['bookLanguage'] = $value;
    }
}
if (isset($_POST['bookPublisher'])) {
    $value = $_POST['bookPublisher'];
    if ($value != "") {
        $query['bookPublisher'] = $value;
    }
}
if (isset($_POST['bookIsbn'])) {
    $value = $_POST['bookIsbn'];
    if ($value != "") {
        $query['bookIsbn'] = $value;
    }
}

$fields = array('_id', 'bookTitle', 'bookAuthors', 'bookEdition', 'bookPublishedOn',
    'bookLanguage', 'bookPublisher', 'bookIsbn', 'bookDescription', 'bookCover');

/* Connect to MongoDB Database */
$mongoCrud = new MongoCrud("test", 'test_col');
/* Search the database with the received search query */
$cursor = $mongoCrud->find($query, $fields);

/* Now construct the json object to be sent as response */
$jsonBookData = array();
foreach ($cursor as $book) {
    /* Each book has many properties, hence the json will be an array of books*/
    $bookData = array(
        '_id' => $book['_id'],
        'bookTitle' => $book['bookTitle'],
        'bookAuthors' => $book['bookAuthors'],
        'bookEdition' => $book['bookEdition'],
        'bookPublishedOn' => $book['bookPublishedOn'],
        'bookLanguage' => $book['bookLanguage'],
        'bookPublisher' => $book['bookPublisher'],
        'bookIsbn' => $book['bookIsbn'],
        'bookDescription' => $book['bookDescription'],
        'bookCover' => $book['bookCover']
    );
    // Add the book to the jsonBookData object
    array_push($jsonBookData, $bookData);
}
// Now convert the jsonBookData object into a proper json and overwrite the same object with
// the json value
$jsonBookData = json_encode($jsonBookData);

/*
 * Now set the appropriate HTTP Headers, this way we can return the _id and the number of
 * books having the same title. The JavaScript will look inside these headers, and
 * take the appropriate actions.
 */
header('X-FOUND-BOOKS: ' . $cursor->count());

/* Finally do a var_dump of the POST request that was received by the PHP server */
//var_dump($query);

// Send the Json
echo $jsonBookData;
