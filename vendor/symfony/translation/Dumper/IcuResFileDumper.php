<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Dumper;

use Symfony\Component\Translation\MessageCatalogue;

/**
 * IcuResDumper generates an ICU ResourceBundle formatted string representation of a message catalogue.
 *
 * @author Stealth35
 */
class IcuResFileDumper extends FileDumper
{
    /**
     * {@inheritdoc}
     */
    protected $relativePathTemplate = '%domain%/%locale%.%extension%';

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = array())
=======
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = [])
>>>>>>> dev
    {
        $data = $indexes = $resources = '';

        foreach ($messages->all($domain) as $source => $target) {
<<<<<<< HEAD
            $indexes .= pack('v', strlen($data) + 28);
            $data    .= $source."\0";
=======
            $indexes .= pack('v', \strlen($data) + 28);
            $data .= $source."\0";
>>>>>>> dev
        }

        $data .= $this->writePadding($data);

        $keyTop = $this->getPosition($data);

        foreach ($messages->all($domain) as $source => $target) {
            $resources .= pack('V', $this->getPosition($data));

<<<<<<< HEAD
            $data .= pack('V', strlen($target))
=======
            $data .= pack('V', \strlen($target))
>>>>>>> dev
                .mb_convert_encoding($target."\0", 'UTF-16LE', 'UTF-8')
                .$this->writePadding($data)
                  ;
        }

        $resOffset = $this->getPosition($data);

<<<<<<< HEAD
        $data .= pack('v', count($messages))
=======
        $data .= pack('v', \count($messages->all($domain)))
>>>>>>> dev
            .$indexes
            .$this->writePadding($data)
            .$resources
              ;

        $bundleTop = $this->getPosition($data);

        $root = pack('V7',
            $resOffset + (2 << 28), // Resource Offset + Resource Type
            6,                      // Index length
<<<<<<< HEAD
            $keyTop,                // Index keys top
            $bundleTop,             // Index resources top
            $bundleTop,             // Index bundle top
            count($messages),       // Index max table length
            0                       // Index attributes
=======
            $keyTop,                        // Index keys top
            $bundleTop,                     // Index resources top
            $bundleTop,                     // Index bundle top
            \count($messages->all($domain)), // Index max table length
            0                               // Index attributes
>>>>>>> dev
        );

        $header = pack('vC2v4C12@32',
            32,                     // Header size
            0xDA, 0x27,             // Magic number 1 and 2
            20, 0, 0, 2,            // Rest of the header, ..., Size of a char
            0x52, 0x65, 0x73, 0x42, // Data format identifier
            1, 2, 0, 0,             // Data version
            1, 4, 0, 0              // Unicode version
        );

        return $header.$root.$data;
    }

    private function writePadding($data)
    {
<<<<<<< HEAD
        $padding = strlen($data) % 4;
=======
        $padding = \strlen($data) % 4;
>>>>>>> dev

        if ($padding) {
            return str_repeat("\xAA", 4 - $padding);
        }
    }

    private function getPosition($data)
    {
<<<<<<< HEAD
        return (strlen($data) + 28) / 4;
=======
        return (\strlen($data) + 28) / 4;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'res';
    }
}
