<?php

namespace Kubex\C4\Tests\DataTable;

use Kubex\C4\DataTable\Action;
use PHPUnit\Framework\TestCase;

class ActionTest extends TestCase
{
  public function testText()
  {
    $text = 'Instantiation Test';
    $uri = 'uri/link';
    $action = Action::i($text, $uri);
    $this->assertEquals([
      'text' => $text,
      'uri'  => $uri,
    ], $action->serialize());
  }

  public function testTarget()
  {
    $text = 'Instantiation Test';
    $uri = 'uri/link';
    $target = 'modal';
    $action = Action::i($text, $uri)->target($target);
    $this->assertEquals([
      'text'   => $text,
      'uri'    => $uri,
      'target' => $target,
    ], $action->serialize());
  }

  public function testGaid()
  {
    $text = 'Instantiation Test';
    $uri = 'uri/link';
    $gaid = '/uri/gaid';
    $action = Action::i($text, $uri)->gaid($gaid);
    $this->assertEquals([
      'text' => $text,
      'uri'  => $uri,
      'gaid' => $gaid,
    ], $action->serialize());
  }

  public function testAction()
  {
    $text = 'Action 2';
    $uri = '/action/uri/2';
    $gaid = '/uri/gaid/2';
    $target = 'modal';
    $action = Action::i($text, $uri)->target($target)->gaid($gaid);
    $this->assertEquals([
      'text'   => $text,
      'uri'    => $uri,
      'target' => $target,
      'gaid'   => $gaid,
    ], $action->serialize());
  }
}
