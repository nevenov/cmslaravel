<?php

class CoveredClassWithAnonymousFunctionInStaticMethod
{
    public static function runAnonymous()
    {
<<<<<<< HEAD
        $filter = array('abc124', 'abc123', '123');
=======
        $filter = ['abc124', 'abc123', '123'];
>>>>>>> dev

        array_walk(
            $filter,
            function (&$val, $key) {
                $val = preg_replace('|[^0-9]|', '', $val);
            }
        );

        // Should be covered
        $extravar = true;
    }
}
