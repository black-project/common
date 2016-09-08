<?php

namespace Black\Common\Application\Specification;

/**
 * Class NotSpecification
 */
class NotSpecification implements Specification
{
    /**
     * @var Specification
     */
    protected $spec;

    /**
     * @param Specification $spec
     */
    public function __construct(Specification $spec)
    {
        $this->spec = $spec;
    }

    /**
     * @param $subject
     *
     * @return bool
     */
    public function isSatisfiedBy($subject)
    {
        return !$this->spec->isSatisfiedBy($subject);
    }
}
