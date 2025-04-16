<?php

namespace Kubex\C4\Responses\Headers;

use Packaged\Http\Headers\Header;

class CustomRubixHeader implements Header
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

  public function getKey(): string
  {
    return $this->_name;
  }

  public function getValue(): string
  {
    return $this->_message;
  }
}
