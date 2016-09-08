<?php

namespace Black\Bridge\Doctrine\Common\Persistence;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;

/**
 * Class ORMRepository
 */
class ORMRepository
{
    /**
     * @var
     */
    protected $manager;

    /**
     * @var
     */
    protected $class;

    /**
     * @param ObjectManager $manager
     * @param $class
     */
    public function __construct(ObjectManager $manager, $class)
    {
        $this->manager = $manager;
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getClassName() : string
    {
        return $this->class;
    }

    /**
     * @return ObjectManager
     */
    protected function getManager() : ObjectManager
    {
        return $this->manager;
    }

    /**
     * @param string $alias
     * @param null $indexBy
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getQueryBuilder($alias = 'p', $indexBy = null) : QueryBuilder
    {
        return $this->manager
            ->createQueryBuilder()
            ->select($alias)
            ->from($this->class, $alias, $indexBy);
    }
}
