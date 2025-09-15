<?php

namespace Kubex\C4\DataTable;

class Cell
{
  protected array $_properties = [];

  public function __construct(string $text)
  {
    $this->_properties['text'] = $text;
  }

  public static function i(string $text): static
  {
    return new static($text);
  }

  public function heading(string $heading): static
  {
    $this->_properties['heading'] = $heading;
    return $this;
  }

  public function color(string $color): static
  {
    $this->_properties['color'] = $color;
    return $this;
  }

  public function style(string $style): static
  {
    $this->_properties['style'] = $style;
    return $this;
  }

  public function icon(
    string  $src = null,
    ?int    $size = 16,
    ?string $color = null,
    ?string $position = 'left'
  ): static
  {
    $this->_properties['icon'] = [
      'src'      => $src,
      'size'     => $size,
      'color'    => $color,
      'position' => $position,
    ];
    return $this;
  }

  public function hover(string $content, ?string $position): static
  {
    $this->_properties['hover'] = [
      'content'  => $content,
      'position' => $position,
    ];
    return $this;
  }

  public function gaid(string $gaid): static
  {
    $this->_properties['gaid'] = $gaid;
    return $this;
  }

  public function sortValue(string|int $sortValue): static
  {
    $this->_properties['sortValue'] = $sortValue;
    return $this;
  }

  public function uri(string $uri): static
  {
    $this->_properties['uri'] = $uri;
    return $this;
  }

  public function toArray(): array
  {
    return $this->_properties;
  }
}
