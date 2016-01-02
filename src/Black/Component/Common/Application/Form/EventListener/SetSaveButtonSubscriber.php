<?php

namespace Black\Component\Common\Application\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;

/**
 * Class SetSaveButtonSubscriber
 *
 * SetSaveButtonSubscriber add "save" button for your FormType
 */
class SetSaveButtonSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'preSetData'];
    }

    /**
     * Pre set Data form the subscriber and add buttons
     *
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addCreateButtons($form);
    }

    /**
     * Add the buttons
     *
     * @param FormInterface $form
     */
    private function addCreateButtons(FormInterface $form)
    {
        $form
            ->add('save', 'submit', [
                    'label' => 'black.bundle.common.eventListener.setButtonsSubscriber.button.save.label'
                ]
            );
    }
}
