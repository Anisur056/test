<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	function add() {
		$row = $('tr').length;
		$row = $row+1;
		$('tbody').append('<tr><td><input type="text" name="name[]" placeholder="Enter name" required=""></td><td><input type="text" name="phone[]" placeholder="Enter Phone" required=""></td><td><input type="date" name="date[]" placeholder="date" required=""></td></tr>');
	}
</script>

<form method="post">
<table>
	<tbody>
		<tr>
			<td><input type="submit" value="+" onclick="add();"></td>
		</tr>

		<tr>
			<td><input type="submit" name="submit" value="Save" ></td>
		</tr>
	</tbody>
</table>
</form>

<?php 
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];

for ($i=0; $i < count($name); $i++) { 
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=test','root','');


	} catch (PDOException $e) {
		die($e->getMessage());
	}

	$insert = $pdo->prepare('INSERT INTO phone (`name`,`phone`,`date`) VALUES (?,?,?)');
	$insert->execute([$name[$i],$phone[$i],$date[$i]]);
}

	}
 ?>