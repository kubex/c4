<?php

namespace Kubex\C4\DataTable;

class Table
{
  /** @var Row[] $_rows */
  public function __construct(protected array $_rows) { }

  public static function i(array $rows): static
  {
    return new static($rows);
  }

  public function toArray(): array
  {
    $rows = [];
    foreach($this->_rows as $row)
    {
      $rows[] = $row->toArray();
    }
    return ['data' => $rows];
  }
}
