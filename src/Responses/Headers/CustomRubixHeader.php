<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\C4\Responses\RubixHeader;

class CustomRubixHeader implements RubixHeader
{
  protected string $_name;
  protected string $_message;

  public function __construct(string $name, string $message = "")
  {
    $this->_name = $name;
    $this->_message = $message;
  }

  public static function i(string $name, string $message = ""): self
  {
    return new self($name, $message);
  }

  public function name(): string
  {
    return $this->_name;
  }

  public function content(): string
  {
    return $this->_message;
  }
}
