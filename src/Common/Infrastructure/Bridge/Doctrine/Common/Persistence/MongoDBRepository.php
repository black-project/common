<?php

namespace Black\Bridge\Doctrine\Common\Persistence\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class MongoDBRepository
 */
class MongoDBRepository
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
     * @return mixed
     */
     public function createQueryBuilder()
     {
         return $this->manager->createQueryBuilder($this->class);
     }
}
