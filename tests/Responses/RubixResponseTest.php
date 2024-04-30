<?php

namespace Kubex\C4\Tests\Responses;

use Kubex\C4\Responses\Headers\AlertHeader;
use Kubex\C4\Responses\Headers\CloseModalHeader;
use Kubex\C4\Responses\RubixResponse;
use Kubex\Definitions\Headers;
use PHPUnit\Framework\TestCase;

class RubixResponseTest extends TestCase
{
  public function testSend(): void
  {
    $response = RubixResponse::i()->send();

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
  }

  public function testAddHeader(): void
  {
    // Test setting a single header
    $response = RubixResponse::i()
      ->addHeader(AlertHeader::info('Test Alert'))
      ->send();

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
    $this->assertArrayHasKey(Headers::ResponseAlertInfo, $response->headers->all());
    $this->assertEquals('Test Alert', $response->headers->get(Headers::ResponseAlertInfo));

    // Test setting multiple headers
    $response = RubixResponse::i()
      ->addHeader(AlertHeader::success('Test Alert Success'))
      ->addHeader(CloseModalHeader::i())
      ->send();

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
    $this->assertArrayHasKey(Headers::ResponseAlertSuccess, $response->headers->all());
    $this->assertEquals('Test Alert Success', $response->headers->get(Headers::ResponseAlertSuccess));
    $this->assertArrayHasKey(Headers::ResponseCloseModal, $response->headers->all());
    $this->assertEquals('true', $response->headers->get(Headers::ResponseCloseModal));
  }

  public function testSetContent(): void
  {
    $response = RubixResponse::i()
      ->setContent('Test Content')
      ->send();

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
    $this->assertEquals('Test Content', $response->getContent());
  }

  public function testSetHeaderAndContent(): void
  {
    $response = RubixResponse::i()
      ->addHeader(AlertHeader::info('Test Alert'))
      ->setContent('Test Content')
      ->send();

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
    $this->assertArrayHasKey(Headers::ResponseAlertInfo, $response->headers->all());
    $this->assertEquals('Test Alert', $response->headers->get(Headers::ResponseAlertInfo));
    $this->assertEquals('Test Content', $response->getContent());
  }

  public function testSetStatusCode(): void
  {
    $response = RubixResponse::i(200)->send();

    $this->assertIsObject($response);
    $this->assertEquals(200, $response->getStatusCode());

    $response = RubixResponse::i(404)->send();

    $this->assertIsObject($response);
    $this->assertEquals(404, $response->getStatusCode());
  }
}
