<?php
namespace GJClasses;

class HttpHeader
{
    public $log;

    public function __construct()
    {
        $this->log = new Log('class.httpheader');
    }

    public function process($domain)
    {
        $headers = $this->retrieve($domain);
        list($status, $data, $final_destination) = $this->processRules($domain, $headers);
        return array($status, $data, $final_destination);
    }

    public function retrieve($domain)
    {
        stream_context_set_default(
            array(
                'http' => array(
                    'method' => "HEAD",
                    'header' => "Accept-language: en\r\n" .
                        "Cookie: LANGUAGE=en;DEFLANG=en;"
                )
            )
        );

        return get_headers('http://' . $domain);
    }

    public function processRules($domain, $headers)
    {
        if ($headers['0'] == 'HTTP/1.0 200 OK' || $headers['0'] == 'HTTP/1.1 200 OK') {

            $final_header_status = 'Live Site (200)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } elseif ($headers['0'] == 'HTTP/1.0 301 Moved Permanently' || $headers['0'] == 'HTTP/1.1 301 Moved Permanently') {

            list($header_data, $final_destination, $count) = $this->createData($domain, $headers);

            if ($count === 1) {
                $header_status = 'Redirect, Permanent (301)';
            } elseif ($count > 1) {
                $header_status = 'Redirect, Permanent (301) [Multiple Redirects]';
            }

            $final_header_status = $this->checkSameRedirects($domain, $header_status, $header_data);

        } elseif ($headers['0'] == 'HTTP/1.0 302 Found' || $headers['0'] == 'HTTP/1.1 302 Found' || $headers['0'] == 'HTTP/1.1 302 Moved Temporarily') {

            list($header_data, $final_destination, $count) = $this->createData($domain, $headers);

            if ($count === 1) {
                $header_status = 'Redirect, Temporary (302)';
            } elseif ($count > 1) {
                $header_status = 'Redirect, Temporary (302) [Multiple Redirects]';
            }

            $final_header_status = $this->checkSameRedirects($domain, $header_status, $header_data);

        } elseif ($headers['0'] == 'HTTP/1.0 400 Bad Request') {

            $final_header_status = 'Bad Request (400)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } elseif ($headers['0'] == 'HTTP/1.1 403 Forbidden') {

            $final_header_status = 'Forbidden (403)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } elseif ($headers['0'] == 'HTTP/1.0 404 Not Found' || $headers['0'] == 'HTTP/1.1 404 Not Found') {

            $final_header_status = 'Not Found (404)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } elseif ($headers['0'] == 'HTTP/1.1 463' || $headers['0'] == 'HTTP/1.1 463 ') {

            $final_header_status = 'Unspecified Error (463)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } elseif ($headers['0'] == 'HTTP/1.0 500 Internal Server Error' || $headers['0'] == 'HTTP/1.1 500 Internal Server Error') {

            $final_header_status = 'Internal Server Error (500)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } elseif ($headers['0'] == 'HTTP/1.0 503 Service Unavailable' || $headers['0'] == 'HTTP/1.1 503 Service Unavailable' || $headers['0'] == 'HTTP/1.1 503 Service Temporarily Unavailable') {

            $final_header_status = 'Service Temporarily Unavailable (503)';
            $header_data = '';
            $final_destination = 'http://' . $domain;

        } else {

            $final_header_status = $headers['0'];
            $header_data = '';
            $final_destination = 'http://' . $domain;

        }

        return array($final_header_status, $header_data, $final_destination);
    }

    public function createData($domain, $headers)
    {
        $count = 0;

        $header_data = 'http://' . $domain . ' -> ';

        foreach ($headers as $value) {
            if (preg_match("/^Location:/", $value)) {
                $no_slash = rtrim($value, '/');
                $header_data .= substr($no_slash, 10) . " -> ";
                $count++;
            }
        }
        $header_data = substr($header_data, 0, -4);
        $final_destination = substr($no_slash, 10);

        return array($header_data, $final_destination, $count);

    }

    public function checkSameRedirects($domain, $http_header_status, $http_header_data)
    {
        // check to see if the redirect chain is all for the same domain, and if so update it to 'Live Site (200)'
        $final_http_header_status = $http_header_status;

        if ($http_header_status === 'Redirect, Permanent (301)' || $http_header_status ===
            'Redirect, Permanent (301) [Multiple Redirects]' || $http_header_status === 'Redirect, Temporary (302)' ||
            $http_header_status === 'Redirect, Temporary (302) [Multiple Redirects]') {

            // standard port
            $data_variation[0] = 'http://' . $domain; // insecure, no-www
            $data_variation[1] = 'http://www.' . $domain; // insecure, www
            $data_variation[2] = 'https://' . $domain; // secure, no-www
            $data_variation[3] = 'https://www.' . $domain; // secure, www
            // port 443
            $data_variation[4] = 'http://' . $domain . ':443'; // insecure, no-www
            $data_variation[5] = 'http://www.' . $domain . ':443'; // insecure, www
            $data_variation[6] = 'https://' . $domain . ':443'; // secure, no-www
            $data_variation[7] = 'https://www.' . $domain . ':443'; // secure, www

            $data_result = explode(" -> ", $http_header_data);

            $count = 0;

            foreach ($data_result as $value) {

                $data_result_formatted[$count] = $value;
                $count++;

            }

            $all_same_domain = !array_diff($data_result_formatted, $data_variation);

            if ($all_same_domain === true) {

                $final_http_header_status = 'Live Site (200)';

            }

            unset($data_variation);
            unset($data_result);
            unset($data_result_formatted);

        }

        return $final_http_header_status;

    }

}
