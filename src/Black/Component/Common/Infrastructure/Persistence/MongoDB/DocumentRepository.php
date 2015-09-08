<?php

namespace Black\Component\Common\Infrastructure\Persistence\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class DocumentRepository
 */
class DocumentRepository
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
     * @return mixed
     */
     public function createQueryBuilder()
     {
         return $this->manager->createQueryBuilder($this->class);
     }
}
