<?php

namespace Black\Common\Application\Form\Handler;

use Symfony\Component\Form\FormInterface;

/**
 * Interface HandlerInterface
 */
interface HandlerInterface
{
    /**
     * @return mixed
     */
    public function process();

    /**
     * @return FormInterface
     */
    public function getForm();
}
