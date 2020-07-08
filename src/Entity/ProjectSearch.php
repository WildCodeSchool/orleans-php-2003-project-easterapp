<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ProjectSearch
{
    const SORT_BY = [
        'Date' => 'date',
        'Projet' => 'name',
    ];

    private $search;
    private $sortBy;
    private $orderBy;

    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param mixed $search
     * @return ProjectSearch
     */
    public function setSearch($search)
    {
        $this->search = $search;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param mixed $sortBy
     * @return ProjectSearch
     */
    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param mixed $orderBy
     * @return ProjectSearch
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }
}
