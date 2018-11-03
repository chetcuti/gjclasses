<?php
namespace GJClasses;

class Log
{
    public $user_id;
    public $area;
    public $time;
    public $url;

    public function __construct($area)
    {
        $this->user_id = isset($_SESSION['s_user_id']) ? $_SESSION['s_user_id'] : 0;
        $this->area = $area;
        $this->time = new Time();
        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function addEntry($level, $message, $extra_info)
    {
        $deeb = Database::getInstance();
        $pdo = $deeb->cnxx;
        if (!empty($extra_info)) {
            $extra_info_formatted = $this->formatExtraInfo($extra_info);
        } else {
            $extra_info_formatted = '';
        }

        $stmt = $pdo->prepare("
            INSERT INTO `log`
            (`user_id`, `area`, `level`, `message`, `extra`, `url`, `insert_time`)
            VALUES
            (:user_id, :area, :level, :message, :extra, :url, :insert_time)");
        $stmt->bindValue('user_id', $this->user_id, \PDO::PARAM_INT);
        $stmt->bindValue('area', $this->area, \PDO::PARAM_STR);
        $stmt->bindValue('level', $level, \PDO::PARAM_STR);
        $stmt->bindValue('message', $message, \PDO::PARAM_LOB);
        $stmt->bindValue('extra', $extra_info_formatted, \PDO::PARAM_LOB);
        $stmt->bindValue('url', $this->url, \PDO::PARAM_LOB);
        $bind_timestamp = $this->time->stamp();
        $stmt->bindValue('insert_time', $bind_timestamp, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function formatExtraInfo($extra_info)
    {
        $extra_info_formatted = '';
        $last_error = error_get_last();
        $last_error_message = array('Last Error' => $last_error['message']);
        $merged_array = array_merge($last_error_message, $extra_info);
        foreach ($merged_array as $key => $value) {
            $extra_info_formatted .= '"' . $key . '":"' . $value . '", ';
        }
        return substr($extra_info_formatted, 0, -2);
    }

    /*
     * EMERGENCY
     * System is unusable.
     */
    public function emergency($message, $extra_info = array())
    {
        $this->addEntry('emergency', $message, $extra_info);
    }

    /*
     * ALERT
     * Action must be taken immediately.
     * Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.
     */
    public function alert($message, $extra_info = array())
    {
        $this->addEntry('alert', $message, $extra_info);
    }

    /*
     * CRITICAL
     * Critical conditions.
     * Example: Application component unavailable, unexpected exception.
     */
    public function critical($message, $extra_info = array())
    {
        $this->addEntry('critical', $message, $extra_info);
    }

    /*
     * ERROR
     * Runtime errors that do not require immediate action but should typically be logged and monitored.
     */
    public function error($message, $extra_info = array())
    {
        $this->addEntry('error', $message, $extra_info);
    }

    /*
     * WARNING
     * Exceptional occurrences that are not errors.
     * Example: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.
     */
    public function warning($message, $extra_info = array())
    {
        $this->addEntry('warning', $message, $extra_info);
    }

    /*
     * NOTICE
     * Normal but significant events.
     */
    public function notice($message, $extra_info = array())
    {
        $this->addEntry('notice', $message, $extra_info);
    }

    /*
     * INFO
     * Interesting events.
     * Example: User logs in, SQL logs.
     */
    public function info($message, $extra_info = array())
    {
        $this->addEntry('info', $message, $extra_info);
    }

    /*
     * DEBUG
     * Detailed debug information.
     */
    public function debug($message, $extra_info = array())
    {
        $this->addEntry('debug', $message, $extra_info);
    }

    /*
     * LOG
     * Logs with an arbitrary level.
     */
    public function log($message, $extra_info = array())
    {
        $this->addEntry('log', $message, $extra_info);
    }

}
