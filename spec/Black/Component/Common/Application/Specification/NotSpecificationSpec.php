<?php

namespace spec\Black\Common\Application\Specification;

use PhpSpec\ObjectBehavior;
use Black\DDD\DDDinPHP\Application\Specification\Specification;

class NotSpecificationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Black\Common\Application\Specification\NotSpecification');
        $this->shouldImplement('Black\DDD\DDDinPHP\Application\Specification\Specification');
    }

    public function let()
    {
        $s = new SpecificationTest(true);
        $this->beConstructedWith($s);
    }

    public function it_should_be_satisfied_by()
    {
        $subject = true;
        $this->isSatisfiedBy($subject)->shouldReturn(false);
    }
}
