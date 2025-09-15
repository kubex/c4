<?php

namespace Kubex\C4\Responses;

use Kubex\C4\DataTable\Table;
use Packaged\Http\Responses\JsonResponse;

class DataTableResponse extends JsonResponse
{
  public static function create(Table $object = null, $status = 200, $headers = []): static
  {
    $table = $object ? $object->toArray() : ['data' => []];
    return parent::create($table, $status, $headers);
  }
}
