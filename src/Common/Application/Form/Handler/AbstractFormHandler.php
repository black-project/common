<?php

namespace Black\Common\Application\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class AbstractFormHandler implements HandlerInterface
{
    /**
     * @var \Symfony\Component\Form\FormInterface
     */
    protected $form;

    /**
     * @var null|\Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @param FormInterface $form
     * @param RequestStack  $requestStack
     */
    public function __construct(
        FormInterface $form,
        RequestStack $requestStack
    ) {
        $this->form = $form;
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return mixed
     */
    public function process()
    {
        if ('POST' === $this->request->getMethod()) {
            $this->form->handleRequest($this->request);

            if ($this->form->isValid()) {
                return $this->form->getData();
            }
        }
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }
}
