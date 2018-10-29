<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;

class Pagination
{
    private $entityClass;
    private $limit = 10;
    private $currentPage = 1;
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function getEntityClass()
    {
        return $this->entityClass;
    }

    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;

        return $this;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function getPage()
    {
        return $this->currentPage;
    }

    public function setPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    public function getData()
    {
        //Calculer l'offset
        $offset = $this->currentPage * $this->limit - $this->limit;

        //Demander au repository de trouver les éléments
        $repo = $this->manager->getRepository($this->entityClass);
        $data = $repo->findBy([], [], $this->limit, $offset);

        //Renvoyer les éléments
        return $data;
    }

    public function pages()
    {
        $repo = $this->manager->getRepository($this->entityClass);
        $total = count($repo->findAll());

        $pages = ceil($total / $this->limit);

        return $pages;
    }
}