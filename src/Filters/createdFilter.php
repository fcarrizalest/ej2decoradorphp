<?php
namespace App\Filters;

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
