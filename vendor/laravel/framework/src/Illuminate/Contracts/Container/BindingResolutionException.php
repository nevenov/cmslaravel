<?php

namespace Illuminate\Contracts\Container;

use Exception;
<<<<<<< HEAD

class BindingResolutionException extends Exception
=======
use Psr\Container\ContainerExceptionInterface;

class BindingResolutionException extends Exception implements ContainerExceptionInterface
>>>>>>> dev
{
    //
}
