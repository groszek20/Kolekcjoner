<?php

class LogFile {
    
    static public function AddLog($logText, $line = 0, $script_name = false, $filename = false) {
            
        $ip = $_SERVER['REMOTE_ADDR'];  
        $time = date('H:i:s');
        $line = ($line == 0) ? "" : "[linia #{$line}]";
        $script_name = ($script_name === false) ? "" : "[plik $script_name]";
        
        if($filename === false) { $filename = LogFolder.date("d_m_Y")."-log.log"; }
        
        if(file_exists($filename)) {
            $fh = fopen($filename, "a") or die("nie moge zapisać!");
        } else {
            $fh = fopen($filename, "w") or die("nie moge zapisać!");
            fwrite($fh, "Plik dziennika [ ".date("d/m/Y")." ]\n---------------------------------------\n\n");  
        }
        
        fwrite($fh, "+ [$time][$ip]$script_name$line: $logText\n");
        fclose($fh); 
        
    }
    
}

?>