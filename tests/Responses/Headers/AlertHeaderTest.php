<?php

namespace Kubex\C4\Tests\Responses\Headers;

use Kubex\C4\Responses\Headers\AlertHeader;
use Kubex\Definitions\Headers;
use PHPUnit\Framework\TestCase;

class AlertHeaderTest extends TestCase
{
  public function testDangerAlert(): void
  {
    $header = AlertHeader::danger('Test Danger Alert');

    $this->assertEquals(Headers::ResponseAlertDanger, $header->getKey());
    $this->assertEquals('Test Danger Alert', $header->getValue());
  }

  public function testWarningAlert(): void
  {
    $header = AlertHeader::warning('Test Warning Alert');

    $this->assertEquals(Headers::ResponseAlertWarning, $header->getKey());
    $this->assertEquals('Test Warning Alert', $header->getValue());
  }

  public function testInfoAlert(): void
  {
    $header = AlertHeader::info('Test Info Alert');

    $this->assertEquals(Headers::ResponseAlertInfo, $header->getKey());
    $this->assertEquals('Test Info Alert', $header->getValue());
  }

  public function testSuccessAlert(): void
  {
    $header = AlertHeader::success('Test Success Alert');

    $this->assertEquals(Headers::ResponseAlertSuccess, $header->getKey());
    $this->assertEquals('Test Success Alert', $header->getValue());
  }
}
