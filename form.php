<?php
//connect to db test
$mongo = new Mongo();
$db = $mongo->selectDB("test");

// select a collection (analogous to a relational database's table)
$collection = $db->comments;
echo 'Success';
?>

<form method="post">
	<input type="text" name="username" /><br/>
	<textarea name="comment"></textarea><br/>
	<input type="submit" value="Submit"/>
</form>

<?php
if(!empty($_POST) && $_POST["username"] != "" && $_POST["comment"] != ""){
	// add new record
	$comment = array( "username" => $_POST["username"], "date" => date("h:i A d M Y"), "comment" => $_POST["comment"]);
	$collection->insert($comment);
}

// find everything in the comments collection
$results = $collection->find();
?>

<table border='1' width="90%">
	<tr>
		<th>User</th>
		<th>Comment</th>
	</tr>
	<?php foreach ($results as $row):?>
		<tr>
			<td><?php echo $row["date"]?><br/><b><?php echo $row["username"];?></b></td>
			<td><?php echo $row["comment"]?></td>
		</tr>
	<?php endforeach;?>
</table>