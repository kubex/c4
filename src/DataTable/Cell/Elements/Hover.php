<?php

namespace Kubex\C4\DataTable\Cell\Elements;

class Hover
{
  protected ?string $_position = 'left';

  public function __construct(protected string $_content)
  {
  }

  public static function i(string $content): static
  {
    return new static($content);
  }

  public function position(?string $position): static
  {
    $this->_position = $position;
    return $this;
  }

  public function serialize(): array
  {
    return [
      'content'  => $this->_content,
      'position' => $this->_position,
    ];
  }
}
