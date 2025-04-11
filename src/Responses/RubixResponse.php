<?php

namespace Kubex\C4\Responses;

use Packaged\Http\Response;

class RubixResponse extends Response
{
  public function __construct($content = '', int $status = 304, array $headers = [])
  {
    parent::__construct($content, $status, $headers);
  }

  public static function i(int $statusCode = 304): self
  {
    $i = new self();
    $i->setStatusCode($statusCode);
    return $i;
  }

  public function setContent($content): self
  {
    $this->setStatusCode(200); // Change the status code to 200 from 304 if we're setting content
    return parent::setContent($content);
  }
}
