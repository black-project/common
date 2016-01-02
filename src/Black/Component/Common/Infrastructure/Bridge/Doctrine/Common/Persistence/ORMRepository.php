<?php

namespace Black\Bridge\Doctrine\Common\Persistence;

use Doctrine\Common\Persistence\ObjectManager;

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
     * @return mixed
     */
    public function getClassName()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    protected function getManager()
    {
        return $this->manager;
    }

    /**
     * @param string $alias
     * @param null $indexBy
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getQueryBuilder($alias = 'p', $indexBy = null)
    {
        return $this->manager
            ->createQueryBuilder()
            ->select($alias)
            ->from($this->class, $alias, $indexBy);
    }
}
