<?php
namespace App\Filters;

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
