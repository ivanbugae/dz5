<?php

namespace classes;

use interfaces\FormaterInterface;

class TxtFormatter implements FormaterInterface
{
    private $logString = "[level] [date] [message] [context]";
    public function format($data)
    {
        $data['date'] = date('d-m-y H:i:s');
        $imploded = '';
        foreach ($data['context'] as $key=>$val){
            if(is_string($val) || (is_object($val) && method_exists($val,'__toString'))){
                $imploded .= $val;
                $imploded .= ' | ';
            }
        }
        $data['context'] = $imploded;

            return $this->text($data);

    }
    private function text($data): string
    {
        return strtr($this->logString,$data) . PHP_EOL;
    }
}