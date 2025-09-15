<?php

namespace Kubex\C4\Tests\DataTable;

use Kubex\C4\DataTable\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
  public function testText()
  {
    $text = 'Instantiation Test';
    $cell = Cell::i($text);
    $this->assertEquals(['text' => $text], $cell->toArray());
  }

  public function testHeading()
  {
    $text = 'Test';
    $heading = 'Title';
    $cell = Cell::i($text)->heading($heading);
    $this->assertEquals(['text' => $text, 'heading' => $heading], $cell->toArray());
  }

  public function testColor()
  {
    $text = 'Test';
    $color = 'primary';
    $cell = Cell::i($text)->color($color);
    $this->assertEquals(['text' => $text, 'color' => $color], $cell->toArray());
  }

  public function testGaid()
  {
    $text = 'Test';
    $gaid = '/uri/gaid';
    $cell = Cell::i($text)->gaid($gaid);
    $this->assertEquals(['text' => $text, 'gaid' => $gaid], $cell->toArray());
  }

  public function testHover()
  {
    $text = 'Test';
    $content = 'Hover Content';
    $position = 'Left';
    $cell = Cell::i($text)->hover($content, $position);
    $this->assertEquals([
      'text'  => $text,
      'hover' => [
        'content'  => $content,
        'position' => $position,
      ],
    ], $cell->toArray());
  }

  public function testUri()
  {
    $text = 'Test';
    $uri = 'uri/link';
    $cell = Cell::i($text)->uri($uri);
    $this->assertEquals(['text' => $text, 'uri' => $uri], $cell->toArray());
  }

  public function testStyle()
  {
    $text = 'Test';
    $style = 'primary';
    $cell = Cell::i($text)->style($style);
    $this->assertEquals(['text' => $text, 'style' => $style], $cell->toArray());
  }

  public function testSortValue()
  {
    $text = 'Int Test';
    $sortValue = 1234;
    $cell = Cell::i($text)->sortValue($sortValue);
    $this->assertEquals(['text' => $text, 'sortValue' => $sortValue], $cell->toArray());

    $text = 'String Test';
    $sortValue = '1234';
    $cell = Cell::i($text)->sortValue($sortValue);
    $this->assertEquals(['text' => $text, 'sortValue' => $sortValue], $cell->toArray());
  }

  public function testIcon()
  {
    $text = 'Default Icon Values';
    $src = 'check';
    $cell = Cell::i($text)->icon($src);
    $this->assertEquals([
      'text' => $text,
      'icon' => [
        'src'      => $src,
        'size'     => '16',
        'color'    => null,
        'position' => 'left',
      ],
    ], $cell->toArray());

    $text = 'Custom Icon Values';
    $src = 'cancel';
    $size = '20';
    $color = 'primary';
    $position = 'right';
    $cell = Cell::i($text)->icon($src, $size, $color, $position);
    $this->assertEquals([
      'text' => $text,
      'icon' => [
        'src'      => $src,
        'size'     => $size,
        'color'    => $color,
        'position' => $position,
      ],
    ], $cell->toArray());
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
    $hoverContent = 'Hover Content';
    $hoverPosition = 'left';
    $gaid = '/uri/gaid';
    $sortValue = 1234;
    $uri = 'uri/link';
    $cell = Cell::i($text)
      ->heading($heading)
      ->color($color)
      ->style($style)
      ->icon($iconSrc, $iconSize, $iconColor, $iconPosition)
      ->hover($hoverContent, $hoverPosition)
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
    ], $cell->toArray());
  }
}
