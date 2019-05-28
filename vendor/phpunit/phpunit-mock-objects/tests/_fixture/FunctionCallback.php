<?php
function functionCallback()
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
