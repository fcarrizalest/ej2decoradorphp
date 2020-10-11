<?php
namespace App\Filters;

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
