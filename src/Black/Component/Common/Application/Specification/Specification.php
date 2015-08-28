<?php

namespace Black\Component\Common\Application\Specification;

/**
 * Interface Specification
 */
interface Specification
{
    public function isSatisfiedBy($subject);
}
