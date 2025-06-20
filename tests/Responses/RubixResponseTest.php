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
    $response = RubixResponse::create();

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
  }

  public function testAddHeader(): void
  {
    // Test setting a single header
    $response = RubixResponse::create()
      ->addHeader(AlertHeader::info('Test Alert'));

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
    $this->assertArrayHasKey(Headers::ResponseAlertInfo, $response->headers->all());
    $this->assertEquals('Test Alert', $response->headers->get(Headers::ResponseAlertInfo));

    // Test setting multiple headers
    $response = RubixResponse::create()
      ->addHeader(AlertHeader::success('Test Alert Success'))
      ->addHeader(CloseModalHeader::i());

    $this->assertIsObject($response);
    $this->assertEquals(304, $response->getStatusCode());
    $this->assertArrayHasKey(Headers::ResponseAlertSuccess, $response->headers->all());
    $this->assertEquals('Test Alert Success', $response->headers->get(Headers::ResponseAlertSuccess));
    $this->assertArrayHasKey(Headers::ResponseCloseModal, $response->headers->all());
    $this->assertEquals('true', $response->headers->get(Headers::ResponseCloseModal));
  }

  public function testSetContent(): void
  {
    $response = RubixResponse::create()
      ->setContent('Test Content');

    $this->assertIsObject($response);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('Test Content', $response->getContent());
  }

  public function testSetHeaderAndContent(): void
  {
    $response = RubixResponse::create()
      ->addHeader(AlertHeader::info('Test Alert'))
      ->setContent('Test Content');

    $this->assertIsObject($response);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertArrayHasKey(Headers::ResponseAlertInfo, $response->headers->all());
    $this->assertEquals('Test Alert', $response->headers->get(Headers::ResponseAlertInfo));
    $this->assertEquals('Test Content', $response->getContent());
  }

  public function testSetStatusCode(): void
  {
    $response = RubixResponse::create(null, 200);

    $this->assertIsObject($response);
    $this->assertEquals(200, $response->getStatusCode());

    $response = RubixResponse::create(null, 404);

    $this->assertIsObject($response);
    $this->assertEquals(404, $response->getStatusCode());
  }
}
