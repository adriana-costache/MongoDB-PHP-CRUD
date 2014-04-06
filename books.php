<?php

try {

    $connection = new Mongo();
    $database   = $connection->selectDB('fyp');
    $collection = $database->selectCollection('books');
  echo "Successful Connection!";
} catch(MongoConnectionException $e) {
    die("Failed to connect to database ".$e->getMessage());
}

$cursor = $collection->find();

//echo $cursor;

?>

<?php echo "Success2!" ;?>

<?php while ($cursor->hasNext()):
                        $book = $cursor->getNext();?>
                        <?php echo $book['title']; ?>
                        <?php echo $book['author']; ?>
                        <!--<a href="book.php?id=<?php echo $book['_id']; ?>">Read more</a>-->
                      <?php endwhile; ?> 

                      
