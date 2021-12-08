<?php
namespace classes;


use interfaces\FormaterInterface;
use interfaces\WriterInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    protected $writer;
    protected $format;
    public function __construct(WriterInterface $writer, FormaterInterface $format)
    {
        $this->writer = $writer;
        $this->format = $format;
    }
    public function log($level, $date, $message, array $context = array())
    {
        $data = array(
            'level' => $level,
            'date' => $date,
            'message' => $message,
            'context' => $context
        );
        $this->writer->write($this->format->format($data));
    }
}