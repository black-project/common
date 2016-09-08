<?php

namespace Black\Common\Application\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\ChoiceList\ChoiceListInterface;

/**
 * Class ValuetoChoiceOrTextTransformer
 *
 * ValueToChoiceOrTextTransformer save the content of TextType value if "other" is selected.
 * Otherwise, this transformer save the value of the ChoiceType
 */
class ValuetoChoiceOrTextTransformer implements DataTransformerInterface
{
    /**
     * @var array
     */
    protected $choices;

    /**
     * Construct the transformer
     *
     * @param ChoiceListInterface $choices
     */
    public function __construct(ChoiceListInterface $choices)
    {
        $this->choices = $choices->getChoices();
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($data)
    {
        if ('other' === $data['choice']) {
            return $data['text'];
        }

        return $data['choice'];
    }

    /**
     * {@inheritDoc}
     */
    public function transform($data)
    {
        if (in_array($data, $this->choices, true)) {
            return ['choice' => $data, 'text' => null];
        }

        return ['choice' => 'other', 'text' => $data];
    }
}
