<?php
/**
 * Created by IntelliJ IDEA.
 * User: sohail.alam
 * Date: 1/4/14
 * Time: 5:27 PM
 */
include_once "../MongoCrud.php";

$newline = "<br /><br />";
$line = $newline
    . "---------------------------------------------------------------------------------------------------"
    . $newline;

var_dump($_POST);
echo($line);

/*
 * Example
 * array (size=3)
 * 'name' => string 'My Name' (length=7)
 * 'number' => string '12345' (length=5)
 * 'email' => string 'myemail@mail.com' (length=16)
*/

$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];

if (isset($name) && isset($email)) { // Nul Checking two required parameters
    $data = array(
        'name' => $name,
        'number' => $number,
        'email' => $email
    );
}


$mongoCrud = new MongoCrud("test", 'test_col');

echo "Inserted Document => " . $mongoCrud->insert($data);
