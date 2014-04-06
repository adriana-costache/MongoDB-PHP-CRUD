<?php
/**
 * Created by IntelliJ IDEA.
 * User: sohail
 * Date: 4/3/14
 * Time: 11:34 PM
 */
include_once "../library/php/MongoCrud.php";

/* Create an array with the above information which will be inserted into MongoDB */
$dataToUpdate = array();
$query = array();
if (isset($_POST['_id'])) {
    $value = $_POST['_id'];
    if ($value != "") {
        $query['_id'] = new MongoId($value);
    }
}
if (isset($_POST['Authors'])) {
    $value = $_POST['Authors'];
    if ($value != "") {
        $dataToUpdate['bookAuthors'] = $value;
    }
}
if (isset($_POST['Cover'])) {
    $value = $_POST['Cover'];
    if ($value != "") {
        $dataToUpdate['bookCover'] = $value;
    }
}
if (isset($_POST['Description'])) {
    $value = $_POST['Description'];
    if ($value != "") {
        $dataToUpdate['bookDescription'] = $value;
    }
}
if (isset($_POST['Edition'])) {
    $value = $_POST['Edition'];
    if ($value != "") {
        $dataToUpdate['bookEdition'] = intval($value);
    }
}
if (isset($_POST['Isbn'])) {
    $value = $_POST['Isbn'];
    if ($value != "") {
        $dataToUpdate['bookIsbn'] = $value;
    }
}
if (isset($_POST['Language'])) {
    $value = $_POST['Language'];
    if ($value != "") {
        $dataToUpdate['bookLanguage'] = $value;
    }
}
if (isset($_POST['PublishedOn'])) {
    $value = $_POST['PublishedOn'];
    if ($value != "") {
        $dataToUpdate['bookPublishedOn'] = intval($value);
    }
}
if (isset($_POST['Publisher'])) {
    $value = $_POST['Publisher'];
    if ($value != "") {
        $dataToUpdate['bookPublisher'] = $value;
    }
}
if (isset($_POST['Title'])) {
    $value = $_POST['Title'];
    if ($value != "") {
        $dataToUpdate['bookTitle'] = $value;
    }
}

/* Connect to MongoDB Database */
$mongoCrud = new MongoCrud("test", 'test_col');
/* Search the database with the received search query */
$saved = $mongoCrud->update($query, $dataToUpdate);

var_dump($_POST);

if ($saved) {
    echo("Successfully Updated");
} else {
    echo("Failed to Updated");
}
