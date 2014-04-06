<?php

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

$query = array();
$cursor = $collection->find($query);
//var_dump(iterator_to_array($cursor));

//echo"after cursor!";
//echo"SUCCCCCCEEEESSS";



// var_dump($cursor->count());
// var_dump($cursor->count(true));
 //echo "1";
 //var_dump(get_class($collection));
// die;  
//$cursor = $collection->find();
//$num_docs = $collection->find()->count();
//die;
  echo "<br/>";
    
        echo "The list of books in the database is presented below." . "<br/>";
  echo "<br/>";

  while ($cursor->hasNext()):
                        $book = $cursor->getNext(); 


                          echo "Book Id: " . $book['book_id']  ." - " .$book['title']  ; 
                         //echo substr($book['title'], 0, 200) . "<br/>"; ?>
                        <a href="search_details.php?id=<?php echo $book['_id'] ; ?>"> Details Here...</a>
                        <?php echo "<br/>";?>


                      <?php endwhile; 

//it worlks
/*$num_docs = $cursor->count();

   if( $num_docs > 0 )
    {
        // loop over the results
        foreach ($cursor as $obj)
        {
            echo"Title: " . $obj['title'] . "<br/>";
            echo"Author: " . $obj['author'] . "<br/>";
            //echo"Second Author: " . $obj['author2'] . "<br/>";
            echo "\n";
            echo 'Pages: ' . $obj['pages'] . "<br/>";
            echo "\n";
            echo 'Year Published: ' . $obj['year'] . "\n";
            echo "\n";
            echo 'Language: ' . $obj['language'] . "<br/>";
            //echo 'Quantity: ' . $obj['quantity'] . "\n";
            //echo 'Price: ' . $obj['price'] . "\n";
            echo "<br/>";
        }
    }
    else
    {
        // if no products are found, we show this message
        echo "No products found \n";
    }*/
// foreach ($cursor as $doc) {
//   echo var_export($doc, true)."< br />";
// }

// $cursor= $collection->find(array("author" =>"Martin Fowler"));
// echo"\nThis is the content of the document: "; 

// echo "MongoDD: The definitive guide?" . var_export($cursor->getNext(),true);
// die;
//   // foreach ($cursor as $doc) {
  //   echo var_export($doc , true);
  // }

// echo "\n";
//  var_dump($document);
// echo "\n";
//echo "Connected Successfuly!";
//echo $cursor; 
// foreach($cursor as $obj) {  
// // var_dump($cursor);
// // die;  
//  echo 'ID: ' . $obj['_id'] . "\n";
//           echo 'Author: ' . $obj['author'] . "\n";
// echo 'Title: ' . $obj['title'] . "\n";
//          echo "\n";
// } 



// How many results found
   
    //debugging 
   // die ;
 //    $num_docs = $cursor->count();
 //  // echo $num_docs;

 //   if( $num_docs > 0 )
 // {
 //        // loop over the results
 //      foreach ($cursor as $obj)
 //       {
 //          // echo 'ID: ' . $obj['_id'] . "\n";
 //           echo 'Author: ' . $obj['author'] . "\n";
 //           echo 'Title: ' . $obj['title'] . "\n";
 //           echo "\n";
 //       }
 //   }
 //  else
 //   {
 //        // if no products are found, we show this message
 //      echo "No products found \n";
 //   }


    // close the connection to MongoDB 
   $connection ->close();
    echo"Connection Closed!";
    


?>



                      
