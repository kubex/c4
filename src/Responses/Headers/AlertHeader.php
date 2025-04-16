<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\Definitions\Headers;
use Packaged\Http\Headers\Header;

class AlertHeader implements Header
{
  protected string $_name = Headers::ResponseAlertInfo;
  protected string $_message = "";

  private function __construct(string $_name, string $_message)
  {
    $this->_name = $_name;
    $this->_message = $_message;
  }

  public static function danger($message): AlertHeader
  {
    return new self(Headers::ResponseAlertDanger, $message);
  }

  public static function warning($message): AlertHeader
  {
    return new self(Headers::ResponseAlertWarning, $message);
  }

  public static function info($message): AlertHeader
  {
    return new self(Headers::ResponseAlertInfo, $message);
  }

  public static function success($message): AlertHeader
  {
    return new self(Headers::ResponseAlertSuccess, $message);
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
