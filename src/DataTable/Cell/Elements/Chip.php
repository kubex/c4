<?php

namespace Kubex\C4\DataTable\Cell\Elements;

class Chip
{
  protected ?string $_color = null;

  public function __construct(protected string $_type)
  {
  }

  public static function i(string $type): static
  {
    return new static($type);
  }

  public function color(?string $color): static
  {
    $this->_color = $color;
    return $this;
  }

  public function serialize(): array
  {
    $chip = [
      'type' => $this->_type,
    ];
    if($this->_color)
    {
      $chip['color'] = $this->_color;
    }
    return $chip;
  }
}
