<?php

namespace Black\Common\Application\Form\Type;

use Doctrine\DBAL\Types\TextType;
use Black\Common\Application\Form\Transformer\ArrayToDelimitedStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class TagType
 *
 * TagType create a new type based on FormToArrayDelimitedTransformer
 */
class TagType extends AbstractType
{
    /**
     * @var
     */
    protected $name;

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new ArrayToDelimitedStringTransformer();
        $builder->addModelTransformer($transformer);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return TextType::class;
    }
}
