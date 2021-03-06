<?php

namespace Site\DBBundle\Entity;

use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends NestedTreeRepository
{
    public function findAllToArray()
    {
        $result =  $this->_em
            ->createQueryBuilder()
            ->select("c.id, c.name,c.slug,c.lft,c.rgt,c.root, p.id as parent_id")
            ->from($this->_entityName, "c")
            ->leftJoin("c.parent","p")
            ->orderBy("c.root")->addOrderBy("c.name")
            ->getQuery()
            ->getArrayResult();

        return $result;
    }
}
