<?php

class LogFile {
    
    static public function AddLog($logText, $line = 0, $scriptName = false, $filename = false) {
            
        $ip = $_SERVER['REMOTE_ADDR'];  
        $time = date('H:i:s');
        $line = ($line == 0) ? "" : "[linia #{$line}]";
        $scriptName = ($scriptName === false) ? "" : "[plik $scriptName]";
        
        if($filename === false) { $filename = LogFolder.date("d_m_Y")."-log.log"; }
        
        if(file_exists($filename)) {
            $fh = fopen($filename, "a") or die("nie moge zapisać!");
        } else {
            $fh = fopen($filename, "w") or die("nie moge zapisać!");
            fwrite($fh, "Plik dziennika [ ".date("d/m/Y")." ]\n---------------------------------------\n\n");  
        }
        
        fwrite($fh, "+ [$time][$ip]$scriptName$line: $logText\n");
        fclose($fh); 
        
    }
    
}

?>