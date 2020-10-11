<?php


if ($_POST) {
    $sql = "SELECT * FROM users WHERE 1=1  ";
    if (isset($_POST['name']) && !empty($_POST['name']) && !is_null($_POST['name'])) {
        $sql .= " AND users.name like '%".$_POST['name']."%'";
    }

    if (isset($_POST['status_id']) && !empty($_POST['status_id']) && !is_null($_POST['status_id'])) {
        $sql .= " AND users.status_id = ".$_POST['status_id'];
    }

    echo $sql;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ej2 Decorador</title>
</head>
<body>

	<form method="post">
		<input type="text" value="<?= (isset($_POST['name']) && !empty($_POST['name']) && !is_null($_POST['name']))?$_POST['name']:"" ?>" name="name" placeholder="name" /><br><br>
		<select name="status_id">
			<option value=""></option>
			<option value="1">Active</option>
			<option value="2">Unactive</option>
		</select><br><br>
		<input type="submit" name="">
	</form>
</body>
</html>