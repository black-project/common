<?php

/*
 * This file is part of the Black package.
 *
 * (c) Boris Tacyniak <boris.tacyniak@free.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Component\Common\Application\Form\Type;

use Doctrine\DBAL\Types\TextType;
use DTL\Symfony\Form\DataTransformer\ArrayToDelimitedStringTransformer;
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
