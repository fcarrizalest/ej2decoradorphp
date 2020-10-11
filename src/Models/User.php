<?php

namespace App\Models;

use App\Filters\filterInterface;

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
