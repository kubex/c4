<?php

namespace Kubex\C4\DataTable;

class Row
{
  /** @var Cell[] $_cells */
  protected array $_cells = [];
  /** @var Action[] $_actions */
  protected array $_actions = [];
  protected array $_properties = [];

  public function __construct(protected string $id)
  {
    $this->_properties['id'] = $this->id;
  }

  public static function i(string $id): static
  {
    return new static($id);
  }

  /**
   * @param Cell[] $cells
   */
  public function cells(array $cells): static
  {
    $this->_cells = $cells;
    return $this;
  }

  /**
   * @param Action[] $actions
   */
  public function actions(array $actions): static
  {
    $this->_actions = $actions;
    return $this;
  }

  public function uri(string $uri): static
  {
    $this->_properties['uri'] = $uri;
    return $this;
  }

  public function target(string $target): static
  {
    $this->_properties['target'] = $target;
    return $this;
  }

  public function gaid(string $gaid): static
  {
    $this->_properties['gaid'] = $gaid;
    return $this;
  }

  public function toArray(): array
  {
    $row = $this->_properties;

    foreach($this->_cells as $cell)
    {
      $cells[] = $cell->toArray();
    }
    $row['cells'] = $cells ?? [];

    foreach($this->_actions as $action)
    {
      $actions[] = $action->toArray();
    }
    $row['actions'] = $actions ?? [];

    return $row;
  }
}
