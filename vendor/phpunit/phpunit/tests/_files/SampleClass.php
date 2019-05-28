<?php
class SampleClass
{
    public $a;
<<<<<<< HEAD
    protected $b;
    protected $c;
=======
    public $b;
    public $c;
>>>>>>> dev

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
}
