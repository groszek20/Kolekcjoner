<?php

namespace Managers;

class LogFile
{
    /**
     * @param string $logText
     * @param int $lineNumber
     * @param bool $scriptName
     * @param bool $filename
     */
    static public function AddLog($logText, $lineNumber = 0, $scriptName = false, $filename = false)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date('H:i:s');
        $line = $lineNumber === 0 ? '' : "[linia #{$lineNumber}]";
        $script = !$scriptName ? '' : "[plik $scriptName]";

        if (!$filename) {
            $filename = LogFolder . date('d_m_Y') . '-log.log'; //LogFolder in undefined!!!!
        }

        if (file_exists($filename)) {
            $resource = fopen($filename, 'ab') or die('nie moge zapisać!');
        } else {
            $resource = fopen($filename, 'wb') or die('nie moge zapisać!');
            fwrite(
                $resource,
                'Plik dziennika [ ' .date('d/m/Y') . " ]\n---------------------------------------\n\n"
            );
        }

        fwrite($resource, "+ [$time][$ip]$script$line: $logText\n");
        fclose($resource);
    }
}
