<?php

namespace classes;


use interfaces\WriterInterface;

class LogWriter implements WriterInterface
{
    public function write($data)
    {
        if(!is_dir('src/Log')){
            mkdir('./src/Log');
        }

            $this->log($data);


    }
    private function log($data)
    {
        file_put_contents('./src/Log/log.log', $data,FILE_APPEND);
    }
}