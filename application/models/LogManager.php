<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogManager
 *
 * @author Zeed
 */
class LogManager {

    public static function writeX($msg) {
        //$username = $msg[0];
        $time = date("M j G:i:s Y");
        $ip = getenv('REMOTE_ADDR');
        $userAgent = getenv('HTTP_USER_AGENT');
        $referrer = getenv('HTTP_REFERER');
        $query = getenv('QUERY_STRING');
        $msg = "pelacur";
//COMBINE VARS INTO OUR LOG ENTRY
//CALL THE CENTRAL FUNCTION TO WRITE TO THE LOG FILE
        $this->writeToLogFile($msg);
    }

//ASSIGN THE BASIC VARIABLES FOR YOUR VISITOR


    function writeToLogFile($msg) {
        echo 'kontol';
        $today = date("Y_m_d");
        $logfile = $today . "_login_log.txt";
        $dir = 'logs';
        $saveLocation = $dir . '/' . $logfile;
        echo 'penis';
//        $handle = fopen($saveLocation, "a");
//        fwrite($handle, "$msg\r\n");
        if (!$handle = fopen($saveLocation, "a")) {
//            exit;
        }else {
            if (fwrite($handle, "$msg\r\n") === FALSE) {
//                exit;
            }

            fclose($handle);
        }
        echo 'pekcun';
    }

    function dummyFunc() {
        $file = 'application/logs/aaaax.txt';
        $oldContents = file_get_contents($file);
        $fr = fopen($file, 'a');
        fwrite($fr, "text");
        fwrite($fr, $oldContents);
        fclose($fr);
    }

}

?>
