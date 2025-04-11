<?php

namespace Kubex\C4\Tests\Responses\Headers;

use Kubex\C4\Responses\Headers\CloseModalHeader;
use Kubex\Definitions\Headers;
use PHPUnit\Framework\TestCase;

class CloseModalHeaderTest extends TestCase
{
  public function testCloseModalHeader(): void
  {
    $header = CloseModalHeader::i();

    $this->assertEquals(Headers::ResponseCloseModal, $header->getKey());
    $this->assertEquals('true', $header->getValue());
  }
}
