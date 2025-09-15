<?php

namespace Kubex\C4\DataTable;

class Action
{
  protected ?string $_target = null;
  protected ?string $_gaid = null;

  public function __construct(protected string $_text, protected string $_uri)
  {
  }

  public static function i(string $text, string $uri): static
  {
    return new static($text, $uri);
  }

  public function target(string $target): static
  {
    $this->_target = $target;
    return $this;
  }

  public function gaid(string $gaid): static
  {
    $this->_gaid = $gaid;
    return $this;
  }

  public function serialize(): array
  {
    $action = [
      'text' => $this->_text,
      'uri'  => $this->_uri,
    ];
    if($this->_target)
    {
      $action['target'] = $this->_target;
    }
    if($this->_gaid)
    {
      $action['gaid'] = $this->_gaid;
    }
    return $action;
  }
}
