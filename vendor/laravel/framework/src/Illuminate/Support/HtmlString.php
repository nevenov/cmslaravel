<?php

namespace Illuminate\Support;

use Illuminate\Contracts\Support\Htmlable;

class HtmlString implements Htmlable
{
    /**
     * The HTML string.
     *
     * @var string
     */
    protected $html;

    /**
     * Create a new HTML string instance.
     *
     * @param  string  $html
     * @return void
     */
    public function __construct($html)
    {
        $this->html = $html;
    }

    /**
<<<<<<< HEAD
     * Get the the HTML string.
=======
     * Get the HTML string.
>>>>>>> dev
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->html;
    }

    /**
<<<<<<< HEAD
     * Get the the HTML string.
=======
     * Get the HTML string.
>>>>>>> dev
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }
}
