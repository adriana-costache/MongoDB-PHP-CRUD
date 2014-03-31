<?php

$id = $_GET['id'];

try {

    $connection = new MongoClient();
      echo "Successfully Connected to MongoDB!";
      echo "<br/>";

    $database   = $connection->selectDB("fyp");
    echo"\nDatabase fyp selected Successfully!";
    

    $collection = $database->selectCollection("books");
    echo"\nCollection  books selected Successfully!";
    echo "<br/>";

} catch(MongoConnectionException $e) {
    die("Failed to connect to database ".$e->getMessage());
}

$cursor  = $collection->find(array('_id' => new MongoId($id)));
$book = $cursor->getNext();

?>


<?php echo "Book Id : " . $book['book_id'] . "<br/>"; ?>
<?php echo "Book Title : " . $book['title'] . "<br/>"; ?>
<?php echo "Book author(s) : " . $book['author'] . "<br/>"; ?>
<?php echo "Edition Number : " . $book['edition'] . "<br/>"; ?>
<?php echo "Year Published : " . $book['year'] . "<br/>"; ?>
<?php echo "Lanhuage : " . $book['language'] . "<br/>"; ?>
<?php echo "publisher : " . $book['publisher'] . "<br/>"; ?>
<?php echo "ISBN: " . $book['isbn'] . "<br/>"; ?>
<?php echo "Description : " . $book['description'] . "<br/>"; ?>
<!--<?php echo "Cover : " . $book['cover'] . "<br/>"; ?>-->
<?php echo "Cover : "."</br>"."<img src =". $book['cover'] .">"."<br/>"; ?>
