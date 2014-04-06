

<?php


try {
   /* // a new MongoDB connection
    $conn = new Mongo('localhost');

    // connect to fyp database
    $db = $conn->fyp;

    // a new products collection object
    $collection = $db->books;

    $myQuery = array();
    // fetch all product documents
    $cursor = $collection->find($myQuery);
    
    // How many results found
    //$num_docs = $cursor->count();*/
    $mongo = new MongoClient();
    
    echo 'Conn successful';


    /*$myQuery =  array();
 echo 'Conn successful';
    $cursor = $mongo->fyp->books->find($myQuery);

    echo 'Conn successful';*/
/*
    if( $num_docs > 0 )
    {
        // loop over the results
        foreach ($cursor as $obj)
        {
            echo 'Title: ' . $obj['title'] . "\n";
            echo '1st Author: ' . $obj['author1'] . "\n";
            echo 'Year Published: ' . $obj['year_published'] . "\n";
            echo 'Pages: ' . $obj['pages'] . "\n";
            echo 'Language: ' . $obj['language'] . "\n";
            echo "\n";
        }
    }
    else
    {
        // if no books are found, we show this message
        echo "No books found \n";
    }
*/
    // close the connection to MongoDB 
    //$conn->close();
    //print_r($cursor);
}
catch ( MongoConnectionException $e )
{
    // if there was an error, we catch and display the problem here
    echo $e->getMessage();
}
catch ( MongoException $e )
{
    echo $e->getMessage();
}

?>