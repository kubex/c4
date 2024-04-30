<?php

namespace Kubex\C4\Responses;

interface RubixHeader
{
  public function name(): string;

  public function content(): string;
}
