<?php

declare(strict_types=1);

namespace Tests;

use App\DesignPattern\CsvFileWriter;
use App\DesignPattern\JsonFileWriter;
use PHPUnit\Framework\TestCase;

class ExampleProcessorTest extends TestCase
{
  public function testExampleProcessorWork(): void
  {
    $mockFileWriter  = $this->createMock(CsvFileWriter::class);
    $mockFileWriter->expects($this->once())
      ->method('writeToFile')
      ->willReturn(true);

    $processor = new \App\DesignPattern\ExampleProcessor($mockFileWriter);
    $result = $processor->process(['data' => 'test']);

    $this->assertTrue($result);

    $mockFileWriter = $this->createMock(JsonFileWriter::class);
    $mockFileWriter->expects($this->once())
      ->method('writeToFile')
      ->willReturn(true);

    $processor = new \App\DesignPattern\ExampleProcessor($mockFileWriter);
    $processor->process(['data' => 'test']);

    $this->assertTrue($result);
  }

  public function testExampleProcessorFail(): void
  {
    $this->expectException(\Exception::class);

    $mockFileWriter = $this->createMock(CsvFileWriter::class);
    $mockFileWriter->expects($this->once())
      ->method('writeToFile')
      ->willReturn(false);

    $processor = new \App\DesignPattern\ExampleProcessor($mockFileWriter);
    $processor->process(['data' => 'test']);
  }
}
