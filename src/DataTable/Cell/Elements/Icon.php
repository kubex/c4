<?php

namespace Kubex\C4\DataTable\Cell\Elements;

class Icon
{
  protected ?string $_size = '16';
  protected ?string $_color = 'default';
  protected ?string $_position = 'left';

  public function __construct(protected string $_src)
  {
  }

  public static function i(string $src): static
  {
    return new static($src);
  }

  public function size(?int $size): static
  {
    $this->_size = $size;
    return $this;
  }

  public function color(?string $color): static
  {
    $this->_color = $color;
    return $this;
  }

  public function position(?string $position): static
  {
    $this->_position = $position;
    return $this;
  }

  public function serialize(): array
  {
    return [
      'src'      => $this->_src,
      'size'     => $this->_size,
      'color'    => $this->_color,
      'position' => $this->_position,
    ];
  }
}
