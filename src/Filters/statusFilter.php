<?php
namespace App\Filters;

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
