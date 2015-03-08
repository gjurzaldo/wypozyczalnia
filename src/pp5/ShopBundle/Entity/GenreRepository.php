<?php
namespace pp5\ShopBundle\Entity;

use Doctrine\ORM\EntityRepository;

class GenreRepository extends EntityRepository {

    /**
     * Find All sorted by name
     *
     * @return
     */
    public function findAll() {
        return $this->findBy(array(), array('name' => 'ASC'));
    }



} 