<?php

namespace Kubex\C4\DataTable;

use Kubex\C4\DataTable\Cell\Cell;

class Row
{
  /** @var Cell[] $_cells */
  protected array $_cells = [];
  /** @var Action[] $_actions */
  protected array $_actions = [];
  protected string $_uri = '';
  protected string $_target = '';
  protected string $_gaid = '';

  public function __construct(protected string $_id)
  {
  }

  public static function i(string $id): static
  {
    return new static($id);
  }

  public function addCell(Cell $cell): static
  {
    $this->_cells[] = $cell;
    return $this;
  }

  public function addAction(Action $action): static
  {
    $this->_actions[] = $action;
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

  public function gaid(string $gaid): static
  {
    $this->_gaid = $gaid;
    return $this;
  }

  public function serialize(): array
  {
    $row = [
      'id' => $this->_id,
    ];

    if($this->_uri)
    {
      $row['uri'] = $this->_uri;
    }
    if($this->_target)
    {
      $row['target'] = $this->_target;
    }
    if($this->_gaid)
    {
      $row['gaid'] = $this->_gaid;
    }

    foreach($this->_cells as $cell)
    {
      $cells[] = $cell->serialize();
    }
    $row['cells'] = $cells ?? [];

    foreach($this->_actions as $action)
    {
      $actions[] = $action->serialize();
    }
    $row['actions'] = $actions ?? [];

    return $row;
  }
}
