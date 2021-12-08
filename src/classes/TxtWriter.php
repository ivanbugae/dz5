<?php

namespace classes;


use interfaces\WriterInterface;

class TxtWriter implements WriterInterface
{
    public function write($data)
    {
        if(!is_dir('src/Log')){
            mkdir('./src/Log');
        }

            $this->txt($data);

    }
    private function txt($data)
    {
        file_put_contents('./src/Log/log.txt', $data,FILE_APPEND);
    }
}