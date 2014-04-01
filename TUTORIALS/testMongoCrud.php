<?php
/**
 * User: sohail.alam
 * Date: 1/4/14
 * Time: 2:45 PM
 */

include_once "../MongoCrud.php";

$newline = "<br /><br />";
$line = $newline
    . "---------------------------------------------------------------------------------------------------"
    . $newline;


// Initialize the MongoCrud
echo("Initializing the MongoCrud" . $line);
$mongoCrud = new MongoCrud("test", 'test_col');


// Create a new data array to be inserted
$data = array(
    'name' => 'adri',
    'note' => 'this is testing'
);
// Insert the data into the database
$id = $mongoCrud->insert($data);
echo "This is the id of the newly created document: " . $id . $line;


// Search the database for the data with the given key and dump it
echo "Searching for 'name' => 'adri'" . $newline;
$foundOne = $mongoCrud->findOne(array('name' => 'adri'));
var_dump($foundOne);
echo($line);

// Remove existing entry(s)
echo "Removing 'name' => 'adri'" . $newline;
$removed = $mongoCrud->remove(array('name' => 'adri'));
echo 'Data Removed - Affected : ' . $removed['n'] . ' document(s).' . $line;


// Saving a really complex data
echo "Saving a really complex data" . $newline;
$data = array(
    '_id' => 'complexData',
    'anArray' => array(
        'name' => 'this is my name',
        'age' => 'this is my age',
        'experience' => array(
            'java' => 2,
            'php' => 2,
            'objective c' => 'Dont know yet!!'
        )
    )
);
$removed = $mongoCrud->remove(array('_id' => 'complexData'));
$mongoCrud->insert($data);
$foundOne = $mongoCrud->findOne(array('_id' => 'complexData'));
var_dump($foundOne);
echo($line);

echo "Inserting a bunch of Documents" . $newline;
// Inserting many documents
for ($i = 0; $i < 20; $i++) {
    $data = array(
        '_id' => $i,
        'name' => 'adri ',
        'number' => rand(0, 100), // Generate a random name
        'note' => 'NOTE'
    );
    $id = $mongoCrud->insert($data);
}
// This is an example of AND query
$criteria = array(
    'note' => 'NOTE',
    '_id' => array('$gt' => 2) //  Notice here I have used conditional logic, as defined in MongoDB
);
// retrieve only 'name' and '_id' keys
$fields = array('_id', 'name', 'number');
echo "Searching for documents with multiple criteria: " . $newline;
// execute query
$cursor = $mongoCrud->find($criteria, $fields);
// iterate through the result set
// print each document
echo $cursor->count() . ' document(s) found' . $newline;
// sort by name and limit to 5 documents only
$cursor->sort(array('number' => 1))->limit(5);
foreach ($cursor as $obj) {
    echo '_id: ' . $obj['_id'];
    echo ', Name: ' . $obj['name'];
    echo ', Number: ' . $obj['number'] . '<br/>';
    echo '<br/>';
}
$removed = $mongoCrud->remove(array('note' => 'NOTE'));
echo 'Data Removed - Affected : ' . $removed['n'] . ' document(s).' . $line;
