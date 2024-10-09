<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\C4\Responses\RubixHeader;
use Kubex\Definitions\Headers;

class RefreshHeader implements RubixHeader
{
  protected string $_content;

  public function __construct(string $content)
  {
    $this->_content = $content;
  }

  public function name(): string
  {
    return Headers::ResponseRefresh;
  }

  public function content(): string
  {
    return $this->_content;
  }
}
