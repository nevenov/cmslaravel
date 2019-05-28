<?php
class MethodCallback
{
    public static function staticCallback()
    {
        $args = func_get_args();

<<<<<<< HEAD
        if ($args == array('foo', 'bar')) {
=======
        if ($args == ['foo', 'bar']) {
>>>>>>> dev
            return 'pass';
        }
    }

    public function nonStaticCallback()
    {
        $args = func_get_args();

<<<<<<< HEAD
        if ($args == array('foo', 'bar')) {
=======
        if ($args == ['foo', 'bar']) {
>>>>>>> dev
            return 'pass';
        }
    }
}
