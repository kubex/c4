<?php

namespace Kubex\C4\Responses;

use Packaged\Http\Response;

/**
 * Class RubixResponse
 * A response class for handling Rubix-specific responses.
 * It extends the base Response class and provides additional functionality.
 * Default status code is set to 304 (Not Modified).
 *
 * @package Kubex\C4\Responses
 */
class RubixResponse extends Response
{
  public function __construct($content = '', int $status = 304, array $headers = [])
  {
    parent::__construct($content, $status, $headers);
  }

  public static function create(?string $content = '', int $status = 304, array $headers = []): static
  {
    return parent::create($content, $status, $headers);
  }

  public function setContent(?string $content): static
  {
    $this->setStatusCode(200);
    return parent::setContent($content);
  }
}
