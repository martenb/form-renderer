<?php
/**
 * Test: Nepada\FormRenderer\HelpersTest.
 *
 * This file is part of the nepada/form-renderer.
 * Copyright (c) 2017 Petr Morávek (petr@pada.cz)
 */

declare(strict_types = 1);

namespace NepadaTests\FormRenderer;

use Nepada;
use Nepada\FormRenderer;
use NepadaTests\TestCase;
use Nette\Utils\Html;
use Tester\Assert;


require_once __DIR__ . '/../bootstrap.php';


class HelpersTest extends TestCase
{

    public function testIgnoreEmptyString(): void
    {
        Assert::same(['foo'], FormRenderer\Helpers::parseClassList(['', 'empty' => '', 'foo']));
    }

    public function testIgnoreNull(): void
    {
        Assert::same(['foo'], FormRenderer\Helpers::parseClassList([null, 'empty' => null, 'foo']));
    }

    public function testIgnoreFalse(): void
    {
        Assert::same(['foo'], FormRenderer\Helpers::parseClassList([false, 'empty' => false, 'foo']));
    }

    public function testNoClass(): void
    {
        Assert::same([], FormRenderer\Helpers::parseClassList(null));
    }

    public function testClassSplitting(): void
    {
        Assert::same(['first', 'second'], FormRenderer\Helpers::parseClassList('first second'));
    }

    public function testAddedElementClass(): void
    {
        $element = Html::el('span', ['class' => 'first second']);
        $element->addClass('third');

        Assert::same(['first', 'second', 'third'], FormRenderer\Helpers::parseClassList($element->getClass()));
    }

    public function testAppendedElementClass(): void
    {
        $element = Html::el('span');
        $element->class[] = 'first second';
        $element->class[] = 'third';

        Assert::same(['first', 'second', 'third'], FormRenderer\Helpers::parseClassList($element->getClass()));
    }

}


\run(new HelpersTest());
