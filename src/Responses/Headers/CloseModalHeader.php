<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\Definitions\Headers;
use Packaged\Http\Headers\Header;

class CloseModalHeader implements Header
{
  private function __construct() { }

  public static function i(): CloseModalHeader
  {
    return new self();
  }

  public function getKey(): string
  {
    return Headers::ResponseCloseModal;
  }

  public function getValue(): string
  {
    return 'true';
  }
}
