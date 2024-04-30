<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\C4\Responses\RubixHeader;
use Kubex\Definitions\Headers;

class CloseModalHeader implements RubixHeader
{
  private function __construct() { }

  public static function i(): CloseModalHeader
  {
    return new self();
  }

  public function name(): string
  {
    return Headers::ResponseCloseModal;
  }

  public function content(): string
  {
    return 'true';
  }
}
