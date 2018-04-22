<?php
// src/Entity/search.php
namespace App\Entity;

class Search
{
    protected $search;

    public function getSearch()
    {
        return $this->search;
    }

    public function setSearch($search)
    {
        $this->search = $search;
    }

}