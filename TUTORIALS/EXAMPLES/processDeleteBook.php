<?php
/**
 * Created by IntelliJ IDEA.
 * User: sohail
 * Date: 4/3/14
 * Time: 11:34 PM
 */
include_once "../library/php/MongoCrud.php";
/* Create an array with the above information which will be inserted into MongoDB */
$query = array();
if (isset($_POST['_id'])) {
    $value = $_POST['_id'];
    if ($value != "") {
        $query['_id'] = new MongoId($value);
    }
}
/* Connect to MongoDB Database */
$mongoCrud = new MongoCrud("test", 'test_col');
/* Search the database with the received search query */
$r = $mongoCrud->remove($query);

var_dump($_POST);

echo("Deleted : " . $r['n'] . " many items");
