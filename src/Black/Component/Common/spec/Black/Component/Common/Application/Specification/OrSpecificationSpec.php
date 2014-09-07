<?php

namespace spec\Black\Component\Common\Application\Specification;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Black\DDD\DDDinPHP\Application\Specification\Specification;

class OrSpecificationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType
        ('Black\Component\Common\Application\Specification\OrSpecification');
        $this->shouldImplement('Black\DDD\DDDinPHP\Application\Specification\Specification');
    }

    function let()
    {
        $s1 = new SpecificationTest(true);
        $s2 = new SpecificationTest(false);

        $this->beConstructedWith($s1, $s2);
    }

    function it_should_be_satisfied_by()
    {
        $subject = true;
        $this->isSatisfiedBy($subject)->shouldReturn(true);
    }
}
