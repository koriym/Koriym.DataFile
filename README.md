# Koriym.DataFile

[![Type Coverage](https://shepherd.dev/github/bearsunday/BEAR.Package/coverage.svg)](https://shepherd.dev/github/bearsunday/BEAR.Package)
[![Continuous Integration](https://github.com/koriym/Koriym.DataFile/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/koriym/Koriym.DataFile/actions/workflows/continuous-integration.yml)

## XML Config Loader

This library helps you easily validate and load XML configuration files using XSD schemas. It's designed to ensure the integrity and consistency of your configuration data with minimal effort. Additionally, it can be used to load and validate general XML files.



## Installation

To get started, install the required package using Composer:

```bash
composer require koriym/data-file
```

Validate and load the XML file.

## Usage

### Simple XML Load with Validation

Load and validate your XML files with just a few lines of code:

```php
use Koriym\DataFile\XmlLoad;

$xml = (new XmlLoad())('/path/to/xml', '/path/to/xsd');
assert($xml instanceof SimpleXMLElement);
```

### Config XML Load

Easily load configuration files (`config.xml` or `config.xml.dist`) from the specified directory. If both files are present, config.xml is loaded first:

```php
use Koriym\DataFile\XmlConfigLoad;

$xml = (new XmlConfigLoad('confilg.xml'))('/path/to/config_dir', '/path/to/xsd');
assert($xml instanceof SimpleXMLElement);
```

Using `.dist` files allows you to maintain default settings in your repository while keeping local configurations separate.

### Notes

- The XSD schema ensures your XML files adhere to the defined structure and content standards.
- `.dist` files are useful for providing default configurations that can be overridden by local settings.
