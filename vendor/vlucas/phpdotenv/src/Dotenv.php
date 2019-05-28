<?php

namespace Dotenv;

<<<<<<< HEAD
=======
use Dotenv\Environment\DotenvFactory;
use Dotenv\Environment\FactoryInterface;
>>>>>>> dev
use Dotenv\Exception\InvalidPathException;

/**
 * This is the dotenv class.
 *
 * It's responsible for loading a `.env` file in the given directory and
<<<<<<< HEAD
 * setting the environment vars.
=======
 * setting the environment variables.
>>>>>>> dev
 */
class Dotenv
{
    /**
<<<<<<< HEAD
     * The file path.
     *
     * @var string
     */
    protected $filePath;

    /**
     * The loader instance.
     *
     * @var \Dotenv\Loader|null
     */
    protected $loader;
=======
     * The loader instance.
     *
     * @var \Dotenv\Loader
     */
    protected $loader;

    /**
     * Create a new dotenv instance.
     *
     * @param \Dotenv\Loader $loader
     *
     * @return void
     */
    public function __construct(Loader $loader)
    {
        $this->loader = $loader;
    }
>>>>>>> dev

    /**
     * Create a new dotenv instance.
     *
<<<<<<< HEAD
     * @param string $path
     * @param string $file
     *
     * @return void
     */
    public function __construct($path, $file = '.env')
    {
        $this->filePath = $this->getFilePath($path, $file);
        $this->loader = new Loader($this->filePath, true);
=======
     * @param string|string[]                           $paths
     * @param string|null                               $file
     * @param \Dotenv\Environment\FactoryInterface|null $envFactory
     *
     * @return \Dotenv\Dotenv
     */
    public static function create($paths, $file = null, FactoryInterface $envFactory = null)
    {
        $loader = new Loader(
            self::getFilePaths((array) $paths, $file ?: '.env'),
            $envFactory ?: new DotenvFactory(),
            true
        );

        return new self($loader);
    }

    /**
     * Returns the full paths to the files.
     *
     * @param string[] $paths
     * @param string   $file
     *
     * @return string[]
     */
    private static function getFilePaths(array $paths, $file)
    {
        return array_map(function ($path) use ($file) {
            return rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$file;
        }, $paths);
>>>>>>> dev
    }

    /**
     * Load environment file in given directory.
     *
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<string|null>
>>>>>>> dev
     */
    public function load()
    {
        return $this->loadData();
    }

    /**
<<<<<<< HEAD
     * Load environment file in given directory, suppress InvalidPathException.
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array
=======
     * Load environment file in given directory, silently failing if it doesn't exist.
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
>>>>>>> dev
     */
    public function safeLoad()
    {
        try {
            return $this->loadData();
        } catch (InvalidPathException $e) {
            // suppressing exception
<<<<<<< HEAD
            return array();
=======
            return [];
>>>>>>> dev
        }
    }

    /**
     * Load environment file in given directory.
     *
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<string|null>
>>>>>>> dev
     */
    public function overload()
    {
        return $this->loadData(true);
    }

    /**
<<<<<<< HEAD
     * Returns the full path to the file.
     *
     * @param string $path
     * @param string $file
     *
     * @return string
     */
    protected function getFilePath($path, $file)
    {
        if (!is_string($file)) {
            $file = '.env';
        }

        $filePath = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$file;

        return $filePath;
    }

    /**
=======
>>>>>>> dev
     * Actually load the data.
     *
     * @param bool $overload
     *
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<string|null>
>>>>>>> dev
     */
    protected function loadData($overload = false)
    {
        return $this->loader->setImmutable(!$overload)->load();
    }

    /**
     * Required ensures that the specified variables exist, and returns a new validator object.
     *
<<<<<<< HEAD
     * @param string|string[] $variable
     *
     * @return \Dotenv\Validator
     */
    public function required($variable)
    {
        return new Validator((array) $variable, $this->loader);
=======
     * @param string|string[] $variables
     *
     * @return \Dotenv\Validator
     */
    public function required($variables)
    {
        return new Validator((array) $variables, $this->loader);
>>>>>>> dev
    }

    /**
     * Get the list of environment variables declared inside the 'env' file.
     *
<<<<<<< HEAD
     * @return array
     */
    public function getEnvironmentVariableNames()
    {
        return $this->loader->variableNames;
=======
     * @return string[]
     */
    public function getEnvironmentVariableNames()
    {
        return $this->loader->getEnvironmentVariableNames();
>>>>>>> dev
    }
}
