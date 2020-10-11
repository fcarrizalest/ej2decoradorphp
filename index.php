<?php

require_once 'vendor/autoload.php';

use App\Models\User;
use App\Filters\nameFilter;
use App\Filters\statusFilter;
use App\Filters\createdFilter;

if ($_POST) {
    $user = new User($_POST);
    $nameFilter = new nameFilter($user);
    $statusFilter = new statusFilter($nameFilter);
    $createdFilter = new createdFilter($statusFilter);
    echo $createdFilter->getSql();
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
		<input type="text" value="<?= (isset($_POST['created']) && !empty($_POST['created']) && !is_null($_POST['created']))?$_POST['created']:"" ?>" name="created" placeholder="created" /><br><br>

		<input type="submit" name="">
	</form>
</body>
</html>