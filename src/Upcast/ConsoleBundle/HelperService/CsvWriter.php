<?php
/**
 * Created by PhpStorm.
 * User: sohra_000
 * Date: 06/01/2015
 * Time: 11:45
 */

namespace Upcast\ConsoleBundle\HelperService;

class CsvWriter
{
    public function write($filename, $upcastMonths)
    {
        $data_to_write = NULL;
        foreach($upcastMonths as $month) {
            $data_to_write .= $month . "\n";
        }
        file_put_contents($filename, $data_to_write);
    }
}