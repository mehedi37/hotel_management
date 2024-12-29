<?php
class Logger {
    public static function log($message, $type = 'INFO') {
        $logFile = __DIR__ . '/../../logs/app.log';
        $date = date('Y-m-d H:i:s');
        file_put_contents($logFile, "[$date] $type: $message\n", FILE_APPEND);
    }
}