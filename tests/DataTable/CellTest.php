<?php

namespace Kubex\C4\Tests\DataTable;

use Kubex\C4\DataTable\Cell\Cell;
use Kubex\C4\DataTable\Cell\Elements\Hover;
use Kubex\C4\DataTable\Cell\Elements\Icon;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
  public function testText()
  {
    $text = 'Instantiation Test';
    $heading = 'Title';
    $cell = Cell::i($text, $heading);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
    ], $cell->serialize());
  }

  public function testColor()
  {
    $text = 'Test';
    $heading = 'Title';
    $color = 'primary';
    $cell = Cell::i($text, $heading)->color($color);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'color'   => $color,
    ], $cell->serialize());
  }

  public function testGaid()
  {
    $text = 'Test';
    $heading = 'Title';
    $gaid = '/uri/gaid';
    $cell = Cell::i($text, $heading)->gaid($gaid);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'gaid'    => $gaid,
    ], $cell->serialize());
  }

  public function testHover()
  {
    $text = 'Test';
    $heading = 'Title';

    $content = 'Hover Content';
    $position = 'left';
    $hover = Hover::i($content)->position($position);

    $cell = Cell::i($text, $heading)->hover($hover);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'hover'   => [
        'content'  => $content,
        'position' => $position,
      ],
    ], $cell->serialize());
  }

  public function testUri()
  {
    $text = 'Test';
    $heading = 'Title';
    $uri = 'uri/link';
    $cell = Cell::i($text, $heading)->uri($uri);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'uri'     => $uri,
    ], $cell->serialize());
  }

  public function testStyle()
  {
    $text = 'Test';
    $heading = 'Title';
    $style = 'primary';
    $cell = Cell::i($text, $heading)->style($style);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'style'   => $style,
    ], $cell->serialize());
  }

  public function testSortValue()
  {
    $text = 'Test';
    $heading = 'Title';
    $sortValue = '1234';
    $cell = Cell::i($text, $heading)->sortValue($sortValue);
    $this->assertEquals([
      'text'      => $text,
      'heading'   => $heading,
      'sortValue' => $sortValue,
    ], $cell->serialize());
  }

  public function testIcon()
  {
    $text = 'Default Icon Values';
    $heading = 'Default Title';

    $src = 'check';
    $icon = Icon::i($src);

    $cell = Cell::i($text, $heading)->icon($icon);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'icon'    => [
        'src'      => $src,
        'size'     => '16',
        'color'    => 'default',
        'position' => 'left',
      ],
    ], $cell->serialize());

    $text = 'Custom Icon Values';
    $heading = 'Custom Title';

    $src = 'cancel';
    $size = '20';
    $color = 'primary';
    $position = 'right';
    $icon = Icon::i($src)->size($size)->color($color)->position($position);

    $cell = Cell::i($text, $heading)->icon($icon);
    $this->assertEquals([
      'text'    => $text,
      'heading' => $heading,
      'icon'    => [
        'src'      => $src,
        'size'     => $size,
        'color'    => $color,
        'position' => $position,
      ],
    ], $cell->serialize());
  }

  /**
   * You probably wouldn't create a cell with all of these properties set at the same time
   */
  public function testCell()
  {
    $text = 'Full Cell';
    $heading = 'Title';
    $color = 'primary';
    $style = 'bold';

    $iconSrc = 'check';
    $iconSize = '20';
    $iconColor = 'primary';
    $iconPosition = 'right';
    $icon = Icon::i($iconSrc)->size($iconSize)->color($iconColor)->position($iconPosition);

    $hoverContent = 'Hover Content';
    $hoverPosition = 'left';
    $hover = Hover::i($hoverContent)->position($hoverPosition);

    $gaid = '/uri/gaid';
    $sortValue = 1234;
    $uri = 'uri/link';
    $cell = Cell::i($text, $heading)
      ->color($color)
      ->style($style)
      ->icon($icon)
      ->hover($hover)
      ->gaid($gaid)
      ->sortValue($sortValue)
      ->uri($uri);
    $this->assertEquals([
      'text'      => $text,
      'heading'   => $heading,
      'color'     => $color,
      'style'     => $style,
      'icon'      => [
        'src'      => $iconSrc,
        'size'     => $iconSize,
        'color'    => $iconColor,
        'position' => $iconPosition,
      ],
      'hover'     => [
        'content'  => $hoverContent,
        'position' => $hoverPosition,
      ],
      'gaid'      => $gaid,
      'sortValue' => $sortValue,
      'uri'       => $uri,
    ], $cell->serialize());
  }
}
