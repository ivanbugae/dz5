<?php

namespace classes;


use interfaces\WriterInterface;

class CsvWriter implements WriterInterface
{
    public function write($data)
    {
        if(!is_dir('src/Log')){
            mkdir('./src/Log');
        }

            $this->csv($data);

    }
    private function csv($data)
    {
        if(!file_exists('./src/Log/log.csv')) {
            $csv = fopen('./src/Log/log.csv', 'w');
        }
        $csv = fopen('./src/Log/log.csv','a');
        fputcsv($csv, $data,';',' ');
    }
}