<?php

namespace Black\Bridge\Doctrine\Common;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class Manager
 */
abstract class Manager
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * @param ObjectManager $manager
     * @param $class
     */
    public function __construct(ObjectManager $manager, $class)
    {
        $this->manager = $manager;
        $this->repository = $manager->getRepository($class);
        $metadata = $manager->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * @return ObjectManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return mixed|void
     */
    public function flush()
    {
        $this->manager->flush();
    }
}
