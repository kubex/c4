<?php

namespace Kubex\C4\Responses;

use Packaged\Http\Response;

class EmptyResponse extends Response
{
  public function __construct(?string $content = null, int $status = 304, array $headers = [])
  {
    parent::__construct($content, $status, $headers);
  }

  public static function create(string $content = null, int $status = 304, array $headers = []): static
  {
    return parent::create($content, $status, $headers);
  }
}

