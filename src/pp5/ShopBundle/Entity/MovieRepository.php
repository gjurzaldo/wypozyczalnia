<?php
namespace pp5\ShopBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MovieRepository extends EntityRepository {

    /**
     * Get last added movies
     *
     * @param $limit integer
     * @return array
     */
    public function findByLastAdded($limit) {
        $builder = $this->createQueryBuilder('m');

        $result = $builder->select('m')
            ->orderBy("m.id", "DESC")
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return $result;
    }


    /**
     * Get most commented movies
     *
     * @param $limit integer
     * @return array
     */
    public function findByMostCommented($limit) {
        $builder = $this->createQueryBuilder('m');

        $result = $builder->select('m, COUNT(r.id) as HIDDEN num')

            ->leftJoin('m.reviews', 'r')
            ->groupBy('m.id')
            ->orderBy('num', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return $result;

    }

    /**
     *
     * Get most popular movies
     *
     * @param $limit integer
     * @return array
     */
    public function findByPopular($limit) {
        $builder = $this->createQueryBuilder('m');

        $result = $builder->select('m, COUNT(o.id) as HIDDEN num')

            ->leftJoin('m.orders', 'o')
            ->groupBy('m.id')
            ->orderBy("num", "DESC")
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        return $result;

    }

    /**
     * Find All sorted by title
     *
     * @return
     */
    public function findAll() {
        return $this->findBy(array(), array('title' => 'ASC'));
    }


} 