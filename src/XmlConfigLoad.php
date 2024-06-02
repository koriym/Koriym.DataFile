<?php

declare(strict_types=1);

namespace Koriym\DataFile;

use Koriym\DataFile\Exception\DataFileNotFoundException;
use SimpleXMLElement;

use function assert;
use function dirname;
use function file_exists;
use function getcwd;
use function is_dir;
use function is_file;
use function realpath;
use function sprintf;

final class XmlConfigLoad
{
    /** @var string */
    private $configName;

    /** @var XmlLoad */
    private $xmlLoad;

    public function __construct(string $configName)
    {
        $this->configName = $configName;
        $this->xmlLoad = new XmlLoad();
    }

    public function __invoke(string $xmlPath, string $xsdPath): SimpleXMLElement
    {
        $xmlFullPath = $this->locateConfigFile($xmlPath);

        return ($this->xmlLoad)($xmlFullPath, $xsdPath);
    }

    public function locateConfigFile(string $path): string
    {
        if (is_file($path)) {
            return $path;
        }

        $dirPath = realpath($path) ?: getcwd();
        assert(is_dir($dirPath));

        do {
            $maybePath = sprintf('%s/%s', $dirPath, $this->configName);
            if (file_exists($maybePath) || file_exists($maybePath .= '.dist')) {
                return $maybePath;
            }

            $dirPath = dirname($dirPath); // @phpstan-ignore-line
        } while (dirname($dirPath) !== $dirPath);

        throw new DataFileNotFoundException($path);
    }
}
