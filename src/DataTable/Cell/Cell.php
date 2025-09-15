<?php

namespace Kubex\C4\DataTable\Cell;

use Kubex\C4\DataTable\Cell\Elements\Chip;
use Kubex\C4\DataTable\Cell\Elements\Hover;
use Kubex\C4\DataTable\Cell\Elements\Icon;

class Cell
{
  protected string $_text;
  protected string $_heading;
  protected ?string $_color = null;
  protected ?string $_style = null;
  protected ?Icon $_icon = null;
  protected ?Hover $_hover = null;
  protected ?Chip $_chip = null;
  protected ?string $_gaid = null;
  protected ?string $_sortValue = null;
  protected ?string $_uri = null;
  protected ?string $_target = null;

  public function __construct(string $text, string $heading)
  {
    $this->_text = $text;
    $this->_heading = $heading;
  }

  public static function i(string $text, string $heading): static
  {
    return new static($text, $heading);
  }

  public function color(string $color): static
  {
    $this->_color = $color;
    return $this;
  }

  public function style(string $style): static
  {
    $this->_style = $style;
    return $this;
  }

  public function icon(Icon $icon): static
  {
    $this->_icon = $icon;
    return $this;
  }

  public function hover(Hover $hover): static
  {
    $this->_hover = $hover;
    return $this;
  }

  public function chip(Chip $chip): static
  {
    $this->_chip = $chip;
    return $this;
  }

  public function gaid(string $gaid): static
  {
    $this->_gaid = $gaid;
    return $this;
  }

  public function sortValue(string $sortValue): static
  {
    $this->_sortValue = $sortValue;
    return $this;
  }

  public function uri(string $uri): static
  {
    $this->_uri = $uri;
    return $this;
  }

  public function target(string $target): static
  {
    $this->_target = $target;
    return $this;
  }

  public function serialize(): array
  {
    $data = [
      'text'    => $this->_text,
      'heading' => $this->_heading,
    ];

    if($this->_color)
    {
      $data['color'] = $this->_color;
    }
    if($this->_style)
    {
      $data['style'] = $this->_style;
    }
    if($this->_icon)
    {
      $data['icon'] = $this->_icon->serialize();
    }
    if($this->_hover)
    {
      $data['hover'] = $this->_hover->serialize();
    }
    if($this->_chip)
    {
      $data['chip'] = $this->_chip->serialize();
    }
    if($this->_gaid)
    {
      $data['gaid'] = $this->_gaid;
    }
    if($this->_sortValue)
    {
      $data['sortValue'] = $this->_sortValue;
    }
    if($this->_uri)
    {
      $data['uri'] = $this->_uri;
    }
    if($this->_target)
    {
      $data['target'] = $this->_target;
    }

    return $data;
  }
}
