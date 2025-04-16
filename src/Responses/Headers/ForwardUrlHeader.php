<?php

namespace Kubex\C4\Responses\Headers;

use Packaged\Http\Headers\Header;

class ForwardUrlHeader implements Header
{
  protected string $_uri;

  public function __construct(string $uri)
  {
    $this->_uri = $uri;
  }

  public static function i(string $uri): self
  {
    return new self($uri);
  }

  public function getKey(): string
  {
    return 'x-kubex-forward-uri';
  }

  public function getValue(): string
  {
    return $this->_uri;
  }
}
