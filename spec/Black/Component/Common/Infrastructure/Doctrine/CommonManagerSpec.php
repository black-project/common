<?php

namespace spec\Black\Component\Common\Infrastructure\Doctrine;

use Black\Component\Common\Infrastructure\Doctrine\CommonManager;
use Black\DDD\DDDinPHP\Infrastructure\Persistence\Repository;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommonManagerSpec extends ObjectBehavior
{
    function let(ObjectManager $manager, ClassMetadata $metadata)
    {
        $class = 'spec\Black\Component\Common\Infrastructure\Doctrine\Test';
        $manager->getClassMetadata($class)->willReturn($metadata);
        $manager->getRepository($class)->willReturn('spec\Black\Component\Common\Infrastructure\Doctrine\TestRepository');
        $manager->flush()->willReturn(null);
        $metadata->getName()->willReturn('Test');

        $this->beAnInstanceOf('spec\Black\Component\Common\Infrastructure\Doctrine\TestManager');
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

class TestManager extends CommonManager
{

}

class Test
{
    public $id;
}

class TestRepository implements Repository
{
    public function findAll()
    {
        return [];
    }
}
