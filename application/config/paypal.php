<?php
/** set your paypal credential **/

$config['client_id'] = 'AaFUBcplO9RrKyfWtHMWta34gUtlo69xSGwEd_LAHOyahXaD2DFU2Je67Vnfvfrz_FcoYeGRlxkXdcy-';
$config['secret'] = 'EImjjJXnARU2zZJtpQJrQfgKKA_yRUCjJgIShyRY1bmVI5j8Da6lXMLqdfgENyIcR5qvdxFuqmgxGoPG';
$config['mail_to'] = '';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'live',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);
