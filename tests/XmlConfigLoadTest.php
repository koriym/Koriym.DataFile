<?php

declare(strict_types=1);

namespace Koriym\DataFile;

use Koriym\DataFile\Exception\DataFileNotFoundException;
use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class XmlConfigLoadTest extends TestCase
{
    public function testLoadByDirectory(): void
    {
        $xml = (new XmlConfigLoad('apidoc.xml'))(__DIR__ . '/Fake/Config', __DIR__ . '/Fake/apidoc.xsd');
        $this->assertInstanceOf(SimpleXMLElement::class, $xml);
    }

    public function testLoadByFile(): void
    {
        $xml = (new XmlConfigLoad('apidoc.xml'))(__DIR__ . '/Fake/Config/apidoc.xml.dist', __DIR__ . '/Fake/apidoc.xsd');
        $this->assertInstanceOf(SimpleXMLElement::class, $xml);
    }

    public function testNotFound(): void
    {
        $this->expectException(DataFileNotFoundException::class);
        $xml = (new XmlConfigLoad('apidoc.xml'))(__DIR__ . '/Fake', __DIR__ . '/Fake/apidoc.xsd');
    }
}
