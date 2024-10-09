<?php

namespace Kubex\C4\Responses;

use Packaged\Http\Response;

class RubixResponse
{
  protected array $_headers = [];
  protected string $_content = '';

  private function __construct(protected int $_statusCode = 304) { }

  public static function i(int $statusCode = 304): RubixResponse
  {
    return new self($statusCode);
  }

  public function send(): Response
  {
    return Response::create($this->_content, $this->_statusCode, $this->_getHeaders());
  }

  public function addHeader(RubixHeader $header): static
  {
    $this->_headers[] = $header;
    return $this;
  }

  public function setContent(string $content): static
  {
    $this->_statusCode = 200; // Change the status code to 200 from 304 if we're setting content
    $this->_content = $content;
    return $this;
  }

  protected function _getHeaders(): array
  {
    $headers = [];
    foreach($this->_headers as $header)
    {
      $headers[$header->name()] = $header->content();
    }
    return $headers;
  }
}
