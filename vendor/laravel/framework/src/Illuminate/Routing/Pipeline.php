<?php

namespace Illuminate\Routing;

use Closure;
<<<<<<< HEAD
use Throwable;
use Exception;
=======
use Exception;
use Throwable;
>>>>>>> dev
use Illuminate\Http\Request;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Pipeline\Pipeline as BasePipeline;
use Symfony\Component\Debug\Exception\FatalThrowableError;

/**
 * This extended pipeline catches any exceptions that occur during each slice.
 *
 * The exceptions are converted to HTTP responses for proper middleware handling.
 */
class Pipeline extends BasePipeline
{
    /**
<<<<<<< HEAD
=======
     * Get the final piece of the Closure onion.
     *
     * @param  \Closure  $destination
     * @return \Closure
     */
    protected function prepareDestination(Closure $destination)
    {
        return function ($passable) use ($destination) {
            try {
                return $destination($passable);
            } catch (Exception $e) {
                return $this->handleException($passable, $e);
            } catch (Throwable $e) {
                return $this->handleException($passable, new FatalThrowableError($e));
            }
        };
    }

    /**
>>>>>>> dev
     * Get a Closure that represents a slice of the application onion.
     *
     * @return \Closure
     */
<<<<<<< HEAD
    protected function getSlice()
=======
    protected function carry()
>>>>>>> dev
    {
        return function ($stack, $pipe) {
            return function ($passable) use ($stack, $pipe) {
                try {
<<<<<<< HEAD
                    $slice = parent::getSlice();

                    return call_user_func($slice($stack, $pipe), $passable);
=======
                    $slice = parent::carry();

                    $callable = $slice($stack, $pipe);

                    return $callable($passable);
>>>>>>> dev
                } catch (Exception $e) {
                    return $this->handleException($passable, $e);
                } catch (Throwable $e) {
                    return $this->handleException($passable, new FatalThrowableError($e));
                }
            };
        };
    }

    /**
<<<<<<< HEAD
     * Get the initial slice to begin the stack call.
     *
     * @param  \Closure  $destination
     * @return \Closure
     */
    protected function getInitialSlice(Closure $destination)
    {
        return function ($passable) use ($destination) {
            try {
                return call_user_func($destination, $passable);
            } catch (Exception $e) {
                return $this->handleException($passable, $e);
            } catch (Throwable $e) {
                return $this->handleException($passable, new FatalThrowableError($e));
            }
        };
    }

    /**
=======
>>>>>>> dev
     * Handle the given exception.
     *
     * @param  mixed  $passable
     * @param  \Exception  $e
     * @return mixed
     *
     * @throws \Exception
     */
    protected function handleException($passable, Exception $e)
    {
<<<<<<< HEAD
        if (! $this->container->bound(ExceptionHandler::class) || ! $passable instanceof Request) {
=======
        if (! $this->container->bound(ExceptionHandler::class) ||
            ! $passable instanceof Request) {
>>>>>>> dev
            throw $e;
        }

        $handler = $this->container->make(ExceptionHandler::class);

        $handler->report($e);

        $response = $handler->render($passable, $e);

        if (method_exists($response, 'withException')) {
            $response->withException($e);
        }

        return $response;
    }
}
