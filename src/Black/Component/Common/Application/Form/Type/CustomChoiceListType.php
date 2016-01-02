<?php

namespace Black\Component\Common\Application\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Black\Component\Common\Application\Form\Transformer\ValuetoModelsOrNullTransformer;

/**
 * Class CustomChoiceListType
 *
 * CustomChoiceListType create a Choice list
 */
class CustomChoiceListType extends AbstractType
{
    /**
     * @var
     */
    protected $choiceList;

    /**
     * @var
     */
    protected $choiceListName;

    /**
     * @var
     */
    protected $manager;

    /**
     * Construct the ChoiceList
     *
     * @param string $choiceList
     * @param string $choiceListName
     */
    public function __construct($choiceList, $choiceListName)
    {
        $this->choiceList     = $choiceList;
        $this->choiceListName = $choiceListName;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($this->manager !== null) {
            $builder->addModelTransformer(
                new ValuetoModelsOrNullTransformer($this->manager)
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->choiceListName;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['choice_list' => $this->choiceList]);
    }

    /**
     * Set the manager for the Choice List
     *
     * @param string $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }
}
