<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\Definitions\Headers;
use Packaged\Http\Headers\Header;

class RefreshHeader implements Header
{
  protected string $_content;

  public function __construct(string $content)
  {
    $this->_content = $content;
  }

  public static function i(string $content): self
  {
    return new self($content);
  }

  public function getKey(): string
  {
    return Headers::ResponseRefresh;
  }

  public function getValue(): string
  {
    return $this->_content;
  }
}
