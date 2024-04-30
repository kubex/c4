<?php

namespace Kubex\C4\Responses\Headers;

use Kubex\C4\Responses\RubixHeader;
use Kubex\Definitions\Headers;

class AlertHeader implements RubixHeader
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

  public function name(): string
  {
    return $this->_name;
  }

  public function content(): string
  {
    return $this->_message;
  }
}
