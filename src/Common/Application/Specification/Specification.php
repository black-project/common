<?php

namespace Black\Common\Application\Specification;

/**
 * Interface Specification
 */
interface Specification
{
    public function isSatisfiedBy($subject);
}
