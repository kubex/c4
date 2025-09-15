<?php

namespace Kubex\C4\DataTable;

class Action
{
  protected array $_properties = [];

  public function __construct(string $text, string $uri)
  {
    $this->_properties['text'] = $text;
    $this->_properties['uri'] = $uri;
  }

  public static function i(string $text, string $uri): static
  {
    return new static($text, $uri);
  }

  public function target(?string $target): static
  {
    $this->_properties['target'] = $target;
    return $this;
  }

  public function gaid(?string $gaid): static
  {
    $this->_properties['gaid'] = $gaid;
    return $this;
  }

  public function toArray(): array
  {
    return $this->_properties;
  }
}
