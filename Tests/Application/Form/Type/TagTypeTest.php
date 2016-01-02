<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre 'pocky' Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Black\Component\Common\Application\Form\Type;

use Black\Component\Common\Application\Form\Type\TagType;
use Symfony\Component\Form\Forms;

/**
 * Class TagTypeTest
 */
class TagTypeTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;

    protected $prophet;

    public function testSubmitValidData()
    {
        $formData = 'test, test1';

        $type = new TagType('tag_type');
        $form = $this->factory->create($type);

        $form->submit($formData);

        $this->assertEquals('tag_type', $form->getName());
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals([0 => 'test', 1 => 'test1'], $form->getData());
    }

    protected function setUp()
    {
        $this->factory = Forms::createFormFactoryBuilder()->getFormFactory();
    }
}
