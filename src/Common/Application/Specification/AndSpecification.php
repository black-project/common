<?php

namespace Black\Common\Application\Specification;

/**
 * Class AndSpecification
 */
class AndSpecification
{
    /**
     * @var Specification
     */
    protected $spec1;

    /**
     * @var Specification
     */
    protected $spec2;

    /**
     * @param Specification $spec1
     * @param Specification $spec2
     */
    public function __construct(Specification $spec1, Specification $spec2)
    {
        $this->spec1 = $spec1;
        $this->spec2 = $spec2;
    }

    /**
     * @param $subject
     *
     * @return bool
     */
    public function isSatisfiedBy($subject)
    {
        return $this->spec1->isSatisfiedBy($subject)
            && $this->spec2->isSatisfiedBy($subject);
    }
}
