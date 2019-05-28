<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> dev
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Diff;

<<<<<<< HEAD
class Line
=======
final class Line
>>>>>>> dev
{
    const ADDED     = 1;
    const REMOVED   = 2;
    const UNCHANGED = 3;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $content;

<<<<<<< HEAD
    /**
     * @param int    $type
     * @param string $content
     */
    public function __construct($type = self::UNCHANGED, $content = '')
=======
    public function __construct(int $type = self::UNCHANGED, string $content = '')
>>>>>>> dev
    {
        $this->type    = $type;
        $this->content = $content;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getContent()
=======
    public function getContent(): string
>>>>>>> dev
    {
        return $this->content;
    }

<<<<<<< HEAD
    /**
     * @return int
     */
    public function getType()
=======
    public function getType(): int
>>>>>>> dev
    {
        return $this->type;
    }
}
