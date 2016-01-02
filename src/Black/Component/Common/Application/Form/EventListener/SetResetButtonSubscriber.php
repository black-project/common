<?php

namespace Black\Component\Common\Application\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;

/**
 * Class SetResetButtonSubscriber
 *
 * SetResetButtonSubscriber add "reset" button for your FormType
 */
class SetResetButtonSubscriber implements EventSubscriberInterface
{
    /**
     * List events for this subscriber
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'preSetData'];
    }

    /**
     * Pre set Data form the subscriber and add button
     *
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addResetButton($form);
    }

    /**
     * Add the button
     *
     * @param FormInterface $form
     */
    private function addResetButton(FormInterface $form)
    {
        $form
            ->add('reset', 'reset', [
                    'label' => 'black.bundle.common.eventListener.setButtonsSubscriber.button.reset.label'
                ]
            );
    }
}
