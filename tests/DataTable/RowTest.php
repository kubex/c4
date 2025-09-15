<?php

namespace Kubex\C4\Tests\DataTable;

use Kubex\C4\DataTable\Action;
use Kubex\C4\DataTable\Cell\Cell;
use Kubex\C4\DataTable\Row;
use PHPUnit\Framework\TestCase;

class RowTest extends TestCase
{
  public function testId()
  {
    $id = 'row-1';
    $row = Row::i($id);
    $this->assertEquals([
      'id'      => $id,
      'cells'   => [],
      'actions' => [],
    ], $row->serialize());
  }

  public function testUri()
  {
    $id = 'row-1';
    $uri = '/row/uri';
    $row = Row::i($id)->uri($uri);
    $this->assertEquals([
      'id'      => $id,
      'uri'     => $uri,
      'cells'   => [],
      'actions' => [],
    ], $row->serialize());
  }

  public function testTarget()
  {
    $id = 'row-1';
    $target = 'modal';
    $row = Row::i($id)->target($target);
    $this->assertEquals([
      'id'      => $id,
      'target'  => $target,
      'cells'   => [],
      'actions' => [],
    ], $row->serialize());
  }

  public function testGaid()
  {
    $id = 'row-1';
    $gaid = '/uri/gaid';
    $row = Row::i($id)->gaid($gaid);
    $this->assertEquals([
      'id'      => $id,
      'gaid'    => $gaid,
      'cells'   => [],
      'actions' => [],
    ], $row->serialize());
  }

  public function testCells()
  {
    $id = 'row-1';
    $row = Row::i($id);

    $cell1Text = 'Cell 1';
    $cell1Heading = 'Cell Heading 1';
    $cell1 = Cell::i($cell1Text, $cell1Heading);
    $row->addCell($cell1);

    $cell2Text = 'Cell 2';
    $cell2Heading = 'Cell Heading 2';
    $cell2Color = 'primary';
    $cell2 = Cell::i($cell2Text, $cell2Heading)->color($cell2Color);
    $row->addCell($cell2);

    $this->assertEquals([
      'id'      => $id,
      'cells'   => [
        [
          'text'    => $cell1Text,
          'heading' => $cell1Heading,
        ],
        [
          'text'    => $cell2Text,
          'heading' => $cell2Heading,
          'color'   => $cell2Color,
        ],
      ],
      'actions' => [],
    ], $row->serialize());
  }

  public function testActions()
  {
    $id = 'row-1';
    $row = Row::i($id);

    $action1Text = 'Action 1';
    $action1Uri = '/action/uri/1';
    $action1 = Action::i($action1Text, $action1Uri);
    $row->addAction($action1);

    $action2Text = 'Action 2';
    $action2Uri = '/action/uri/2';
    $action2Gaid = '/uri/gaid/2';
    $action2Target = 'modal';
    $action2 = Action::i($action2Text, $action2Uri)->target($action2Target)->gaid($action2Gaid);
    $row->addAction($action2);

    $this->assertEquals([
      'id'      => $id,
      'cells'   => [],
      'actions' => [
        [
          'text' => $action1Text,
          'uri'  => $action1Uri,
        ],
        [
          'text'   => $action2Text,
          'uri'    => $action2Uri,
          'target' => $action2Target,
          'gaid'   => $action2Gaid,
        ],
      ],
    ], $row->serialize());
  }

  public function testRow()
  {
    $rowId = 'row-1';
    $rowUri = '/row/uri';
    $rowTarget = 'modal';
    $rowGaid = '/uri/gaid';

    $row = Row::i($rowId)
      ->uri($rowUri)
      ->target($rowTarget)
      ->gaid($rowGaid);

    $cell1Text = 'Cell 1';
    $cell1Heading = 'Cell Heading 1';
    $cell1 = Cell::i($cell1Text, $cell1Heading);
    $row->addCell($cell1);

    $cell2Text = 'Cell 2';
    $cell2Heading = 'Cell Heading 2';
    $cell2Color = 'primary';
    $cell2 = Cell::i($cell2Text, $cell2Heading)->color($cell2Color);
    $row->addCell($cell2);

    $action1Text = 'Action 1';
    $action1Uri = '/action/uri/1';
    $action1 = Action::i($action1Text, $action1Uri);
    $row->addAction($action1);

    $action2Text = 'Action 2';
    $action2Uri = '/action/uri/2';
    $action2Gaid = '/uri/gaid/2';
    $action2Target = 'modal';
    $action2 = Action::i($action2Text, $action2Uri)->target($action2Target)->gaid($action2Gaid);
    $row->addAction($action2);

    $this->assertEquals([
      'id'      => $rowId,
      'uri'     => $rowUri,
      'target'  => $rowTarget,
      'gaid'    => $rowGaid,
      'cells'   => [
        [
          'text'    => $cell1Text,
          'heading' => $cell1Heading,
        ],
        [
          'text'    => $cell2Text,
          'heading' => $cell2Heading,
          'color'   => $cell2Color,
        ],
      ],
      'actions' => [
        [
          'text' => $action1Text,
          'uri'  => $action1Uri,
        ],
        [
          'text'   => $action2Text,
          'uri'    => $action2Uri,
          'target' => $action2Target,
          'gaid'   => $action2Gaid,
        ],
      ],
    ], $row->serialize());
  }
}
