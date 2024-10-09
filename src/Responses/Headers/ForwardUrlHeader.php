<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\C4\Responses\RubixHeader;

class ForwardUrlHeader implements RubixHeader
{
  protected string $_uri;

  public function __construct(string $uri)
  {
    $this->_uri = $uri;
  }

  public function name(): string
  {
    return 'x-kubex-forward-uri';
  }

  public function content(): string
  {
    return $this->_uri;
  }
}
