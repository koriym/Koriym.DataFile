<?php

declare(strict_types=1);

namespace Koriym\DataFile;

use PHPUnit\Framework\TestCase;

class DataFileTest extends TestCase
{
    /** @var DataFile */
    protected $dataFile;

    protected function setUp(): void
    {
        $this->dataFile = new DataFile();
    }

    public function testIsInstanceOfDataFile(): void
    {
        $actual = $this->dataFile;
        $this->assertInstanceOf(DataFile::class, $actual);
    }
}
