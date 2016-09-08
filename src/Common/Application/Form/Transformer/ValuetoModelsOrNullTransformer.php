<?php

namespace Black\Common\Application\Form\Transformer;

use Black\Common\Infrastructure\Doctrine\Manager;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ValuetoModelsOrNullTransformer
 *
 * ValuetoModelsOrNullTransformer transfom data from collection to an array.
 * It works both with ORM or ODM
 */
class ValuetoModelsOrNullTransformer implements DataTransformerInterface
{
    /**
     * @var
     */
    protected $manager;

    /**
     * Construct the Transformer
     *
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($data)
    {
        if (null === $data) {
            return null;
        }

        if (is_array($data) || is_object($data)) {
            $collection = array();

            foreach ($data as $id) {
                $collection[] = $this->manager->getRepository()->findOneBy(['id' => $id]);
            }

            return $collection;
        }

        $model = $this->manager->getRepository()->findOneBy(['id' => $data]);

        return $model;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($data)
    {
        if (empty($data)) {
            return null;
        }

        if (is_array($data) || is_object($data)) {
            $collection = array();

            if (in_array('getId', get_class_methods($data))) {
                return $data->getId();
            }

            foreach ($data as $model) {
                $collection[] = $model->getId();
            }

            return $collection;
        }

        return $data;
    }
}
