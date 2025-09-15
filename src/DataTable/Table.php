<?php

namespace Kubex\C4\DataTable;

class Table
{
  /** @var Row[] $_rows */
  protected array $_rows = [];

  public function __construct() { }

  public static function i(): static
  {
    return new static();
  }

  public function addRow(Row $row): static
  {
    $this->_rows[] = $row;
    return $this;
  }

  public function toArray(): array
  {
    $rows = [];
    foreach($this->_rows as $row)
    {
      $rows[] = $row->serialize();
    }
    return ['rows' => $rows];
  }
}
