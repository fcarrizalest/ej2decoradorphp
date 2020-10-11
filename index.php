<?php

//1 Definir una interfaz con el método a realizar

interface filterInterface
{
    public function getSql();
}


// 2 Definir una clase Concreta que implemente esta interfaz

class User implements filterInterface
{
    public $data = [];
    public function __construct($data)
    {
        $this->data = $data;
        $this->_sql = "SELECT * FROM users WHERE 1=1";
    }

    public function getSql()
    {
        return $this->_sql;
    }
}

//3 Definir una clase abstracta que implementa la interfaz del paso 1 donde tengamos información a reutilizar entre los objetos Concretos y los decoradores.

abstract class filterDecorador implements filterInterface
{
    public $data = "";
    protected $_filter = null;
    public function __construct(filterInterface $filter)
    {
        $this->data = $filter->data;
        $this->_filter = $filter;
    }
}


// 4 Definir tantas clases se necesiten que hereden de la clase abstracta del paso 3

class nameFilter extends filterDecorador
{
    public function getSql()
    {
        $filter = "";
        if (isset($this->data['name']) && !empty($this->data['name']) && !is_null($this->data['name'])) {
            $filter = " AND name like '%".$this->data['name']."%'";
        }
        return $this->_filter->getSql() .$filter;
    }
}

class statusFilter extends filterDecorador
{
    public function getSql()
    {
        $filter = "";
        if (isset($this->data['status_id']) && !empty($this->data['status_id']) && !is_null($this->data['status_id'])) {
            $filter =  " AND status_id = '".$this->data['status_id']."'";
        }
        return $this->_filter->getSql() . $filter;
    }
}

class createdFilter extends filterDecorador
{
    public function getSql()
    {
        $filter = "";
        if (isset($this->data['created']) && !empty($this->data['created']) && !is_null($this->data['created'])) {
            $filter =  " AND created = '".$this->data['created']."'";
        }
        return $this->_filter->getSql() . $filter;
    }
}




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