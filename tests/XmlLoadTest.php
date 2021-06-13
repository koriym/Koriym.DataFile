<?php

declare(strict_types=1);

namespace Koriym\DataFile;

use Koriym\DataFile\Exception\DataFileException;
use Koriym\DataFile\Exception\DataFileNotFoundException;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

use function chdir;

class XmlLoadTest extends TestCase
{
    public function testLoad(): void
    {
        $xml = (new XmlLoad())(__DIR__ . '/Fake/apidoc.alps.xml', __DIR__ . '/Fake/apidoc.xsd');
        $this->assertInstanceOf(SimpleXMLElement::class, $xml);
    }

    public function testInvalidXml(): void
    {
        $this->expectException(DataFileException::class);
        (new XmlLoad())(__DIR__ . '/Fake/apidoc.error.xml', __DIR__ . '/Fake/apidoc.xsd');
    }

    public function testInvalidXmlPath(): void
    {
        chdir('/');
        $this->expectException(DataFileNotFoundException::class);
        (new XmlLoad())('/__INVALID__', __DIR__ . '/Fale/apidoc.xsd');
    }
}
