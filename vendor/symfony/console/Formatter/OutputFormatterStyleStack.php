<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Formatter;

use Symfony\Component\Console\Exception\InvalidArgumentException;
<<<<<<< HEAD
=======
use Symfony\Contracts\Service\ResetInterface;
>>>>>>> dev

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
<<<<<<< HEAD
class OutputFormatterStyleStack
=======
class OutputFormatterStyleStack implements ResetInterface
>>>>>>> dev
{
    /**
     * @var OutputFormatterStyleInterface[]
     */
    private $styles;

<<<<<<< HEAD
    /**
     * @var OutputFormatterStyleInterface
     */
    private $emptyStyle;

    /**
     * Constructor.
     *
     * @param OutputFormatterStyleInterface|null $emptyStyle
     */
=======
    private $emptyStyle;

>>>>>>> dev
    public function __construct(OutputFormatterStyleInterface $emptyStyle = null)
    {
        $this->emptyStyle = $emptyStyle ?: new OutputFormatterStyle();
        $this->reset();
    }

    /**
     * Resets stack (ie. empty internal arrays).
     */
    public function reset()
    {
<<<<<<< HEAD
        $this->styles = array();
=======
        $this->styles = [];
>>>>>>> dev
    }

    /**
     * Pushes a style in the stack.
<<<<<<< HEAD
     *
     * @param OutputFormatterStyleInterface $style
=======
>>>>>>> dev
     */
    public function push(OutputFormatterStyleInterface $style)
    {
        $this->styles[] = $style;
    }

    /**
     * Pops a style from the stack.
     *
<<<<<<< HEAD
     * @param OutputFormatterStyleInterface|null $style
     *
=======
>>>>>>> dev
     * @return OutputFormatterStyleInterface
     *
     * @throws InvalidArgumentException When style tags incorrectly nested
     */
    public function pop(OutputFormatterStyleInterface $style = null)
    {
        if (empty($this->styles)) {
            return $this->emptyStyle;
        }

        if (null === $style) {
            return array_pop($this->styles);
        }

        foreach (array_reverse($this->styles, true) as $index => $stackedStyle) {
            if ($style->apply('') === $stackedStyle->apply('')) {
<<<<<<< HEAD
                $this->styles = array_slice($this->styles, 0, $index);
=======
                $this->styles = \array_slice($this->styles, 0, $index);
>>>>>>> dev

                return $stackedStyle;
            }
        }

        throw new InvalidArgumentException('Incorrectly nested style tag found.');
    }

    /**
     * Computes current style with stacks top codes.
     *
     * @return OutputFormatterStyle
     */
    public function getCurrent()
    {
        if (empty($this->styles)) {
            return $this->emptyStyle;
        }

<<<<<<< HEAD
        return $this->styles[count($this->styles) - 1];
    }

    /**
     * @param OutputFormatterStyleInterface $emptyStyle
     *
     * @return OutputFormatterStyleStack
=======
        return $this->styles[\count($this->styles) - 1];
    }

    /**
     * @return $this
>>>>>>> dev
     */
    public function setEmptyStyle(OutputFormatterStyleInterface $emptyStyle)
    {
        $this->emptyStyle = $emptyStyle;

        return $this;
    }

    /**
     * @return OutputFormatterStyleInterface
     */
    public function getEmptyStyle()
    {
        return $this->emptyStyle;
    }
}
