<?php

namespace spec\Black\Bridge\Doctrine\Common\Manager;

use Black\Bridge\Doctrine\Common\Manager;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ManagerSpec extends ObjectBehavior
{
    function let(ObjectManager $manager, ClassMetadata $metadata)
    {
        $class = 'spec\Black\Common\Infrastructure\Doctrine\Test';

        $manager->getClassMetadata($class)->willReturn($metadata);
        $manager->getRepository($class)->willReturn('spec\Black\Common\Infrastructure\Doctrine\TestRepository');
        $metadata->getName()->willReturn('Test');

        $this->beAnInstanceOf('spec\Black\Common\Infrastructure\Doctrine\TestManager');
        $this->beConstructedWith($manager, $class);
    }

    function it_should_have_a_manager()
    {
        $this->getManager()->beAnInstanceOf('Doctrine\Common\Persistence\ObjectManager');
    }

    function it_should_flush()
    {
        $this->flush();
    }
}

class TestManager extends Manager
{

}

class Test
{
    public $id;
}

class TestRepository
{
    public function findAll()
    {
        return [];
    }
}
