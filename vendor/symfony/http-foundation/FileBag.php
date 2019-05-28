<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * FileBag is a container for uploaded files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
class FileBag extends ParameterBag
{
<<<<<<< HEAD
    private static $fileKeys = array('error', 'name', 'size', 'tmp_name', 'type');

    /**
     * Constructor.
     *
     * @param array $parameters An array of HTTP files
     */
    public function __construct(array $parameters = array())
=======
    private static $fileKeys = ['error', 'name', 'size', 'tmp_name', 'type'];

    /**
     * @param array $parameters An array of HTTP files
     */
    public function __construct(array $parameters = [])
>>>>>>> dev
    {
        $this->replace($parameters);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function replace(array $files = array())
    {
        $this->parameters = array();
=======
    public function replace(array $files = [])
    {
        $this->parameters = [];
>>>>>>> dev
        $this->add($files);
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
<<<<<<< HEAD
        if (!is_array($value) && !$value instanceof UploadedFile) {
=======
        if (!\is_array($value) && !$value instanceof UploadedFile) {
>>>>>>> dev
            throw new \InvalidArgumentException('An uploaded file must be an array or an instance of UploadedFile.');
        }

        parent::set($key, $this->convertFileInformation($value));
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function add(array $files = array())
=======
    public function add(array $files = [])
>>>>>>> dev
    {
        foreach ($files as $key => $file) {
            $this->set($key, $file);
        }
    }

    /**
     * Converts uploaded files to UploadedFile instances.
     *
     * @param array|UploadedFile $file A (multi-dimensional) array of uploaded file information
     *
<<<<<<< HEAD
     * @return array A (multi-dimensional) array of UploadedFile instances
=======
     * @return UploadedFile[]|UploadedFile|null A (multi-dimensional) array of UploadedFile instances
>>>>>>> dev
     */
    protected function convertFileInformation($file)
    {
        if ($file instanceof UploadedFile) {
            return $file;
        }

        $file = $this->fixPhpFilesArray($file);
<<<<<<< HEAD
        if (is_array($file)) {
=======
        if (\is_array($file)) {
>>>>>>> dev
            $keys = array_keys($file);
            sort($keys);

            if ($keys == self::$fileKeys) {
                if (UPLOAD_ERR_NO_FILE == $file['error']) {
                    $file = null;
                } else {
<<<<<<< HEAD
                    $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['size'], $file['error']);
                }
            } else {
                $file = array_map(array($this, 'convertFileInformation'), $file);
=======
                    $file = new UploadedFile($file['tmp_name'], $file['name'], $file['type'], $file['error']);
                }
            } else {
                $file = array_map([$this, 'convertFileInformation'], $file);
                if (array_keys($keys) === $keys) {
                    $file = array_filter($file);
                }
>>>>>>> dev
            }
        }

        return $file;
    }

    /**
     * Fixes a malformed PHP $_FILES array.
     *
     * PHP has a bug that the format of the $_FILES array differs, depending on
     * whether the uploaded file fields had normal field names or array-like
     * field names ("normal" vs. "parent[child]").
     *
     * This method fixes the array to look like the "normal" $_FILES array.
     *
     * It's safe to pass an already converted array, in which case this method
     * just returns the original array unmodified.
     *
<<<<<<< HEAD
     * @param array $data
     *
=======
>>>>>>> dev
     * @return array
     */
    protected function fixPhpFilesArray($data)
    {
<<<<<<< HEAD
        if (!is_array($data)) {
=======
        if (!\is_array($data)) {
>>>>>>> dev
            return $data;
        }

        $keys = array_keys($data);
        sort($keys);

<<<<<<< HEAD
        if (self::$fileKeys != $keys || !isset($data['name']) || !is_array($data['name'])) {
=======
        if (self::$fileKeys != $keys || !isset($data['name']) || !\is_array($data['name'])) {
>>>>>>> dev
            return $data;
        }

        $files = $data;
        foreach (self::$fileKeys as $k) {
            unset($files[$k]);
        }

        foreach ($data['name'] as $key => $name) {
<<<<<<< HEAD
            $files[$key] = $this->fixPhpFilesArray(array(
=======
            $files[$key] = $this->fixPhpFilesArray([
>>>>>>> dev
                'error' => $data['error'][$key],
                'name' => $name,
                'type' => $data['type'][$key],
                'tmp_name' => $data['tmp_name'][$key],
                'size' => $data['size'][$key],
<<<<<<< HEAD
            ));
=======
            ]);
>>>>>>> dev
        }

        return $files;
    }
}
