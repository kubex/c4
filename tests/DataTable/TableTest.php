<?php

namespace Kubex\C4\Tests\DataTable;

use Kubex\C4\DataTable\Action;
use Kubex\C4\DataTable\Cell\Cell;
use Kubex\C4\DataTable\Row;
use Kubex\C4\DataTable\Table;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
  public function testEmptyTable()
  {
    $table = Table::i();
    $this->assertEquals([
      'rows' => [],
    ], $table->toArray());
  }

  public function testTable()
  {
    $table = Table::i();

    $row1Id = 'row-1';
    $row1Uri = '/row/uri/1';
    $row1Target = 'modal';
    $row1Gaid = '/uri/gaid/1';

    $row1 = Row::i($row1Id)
      ->uri($row1Uri)
      ->target($row1Target)
      ->gaid($row1Gaid);

    $row1Cell1Text = 'Row1 Cell 1';
    $row1Cell1Heading = 'Heading 1';
    $row1->addCell(Cell::i($row1Cell1Text, $row1Cell1Heading));

    $row1Cell2Text = 'Row1 Cell 2';
    $row1Cell2Heading = 'Heading 2';
    $row1Cell2Color = 'primary';
    $row1->addCell(Cell::i($row1Cell2Text, $row1Cell2Heading)->color($row1Cell2Color));

    $row1Action1Text = 'Action 1';
    $row1Action1Uri = '/action/uri/1';
    $row1->addAction(Action::i($row1Action1Text, $row1Action1Uri));

    $row1Action2Text = 'Action 2';
    $row1Action2Uri = '/action/uri/2';
    $row1Action2Target = 'modal';
    $row1Action2Gaid = '/uri/gaid/2';
    $row1->addAction(Action::i($row1Action2Text, $row1Action2Uri)->target($row1Action2Target)->gaid($row1Action2Gaid));

    $table->addRow($row1);

    $row2Id = 'row-2';
    $row2 = Row::i($row2Id);
    $row2CellText = 'Single Cell';
    $row2CellHeading = 'Single Heading';
    $row2->addCell(Cell::i($row2CellText, $row2CellHeading));
    $table->addRow($row2);

    $this->assertEquals([
      'rows' => [
        [
          'id'      => $row1Id,
          'uri'     => $row1Uri,
          'target'  => $row1Target,
          'gaid'    => $row1Gaid,
          'cells'   => [
            [
              'text'    => $row1Cell1Text,
              'heading' => $row1Cell1Heading,
            ],
            [
              'text'    => $row1Cell2Text,
              'heading' => $row1Cell2Heading,
              'color'   => $row1Cell2Color,
            ],
          ],
          'actions' => [
            [
              'text' => $row1Action1Text,
              'uri'  => $row1Action1Uri,
            ],
            [
              'text'   => $row1Action2Text,
              'uri'    => $row1Action2Uri,
              'target' => $row1Action2Target,
              'gaid'   => $row1Action2Gaid,
            ],
          ],
        ],
        [
          'id'      => $row2Id,
          'cells'   => [
            [
              'text'    => $row2CellText,
              'heading' => $row2CellHeading,
            ],
          ],
          'actions' => [],
        ],
      ],
    ], $table->toArray());
  }
}
