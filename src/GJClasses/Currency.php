<?php
namespace GJClasses;

class Currency
{
    public $source;

    public function __construct($source, $api_key)
    {
        $this->source = $source;
        $this->api_key = $api_key;
    }

    public function convertAmount($amount, $from_currency, $to_currency)
    {
        return $this->getConvRate($from_currency, $to_currency) * $amount;
    }

    public function getConvRate($from_currency, $to_currency)
    {
        if ($from_currency == $to_currency) return 1.0;

        $conversion_rate = 0.0;

        if ($this->source === 'era') {

            $full_url = 'https://api.exchangeratesapi.io/latest?base=' . $from_currency . '&symbols=' . $to_currency;
            $remote = new Remote();
            $result = $remote->getFileContents($full_url);
            if ($result === false) return false;
            $json_result = json_decode($result, true);
            $conversion_rate = $json_result['rates'][$to_currency];

        } elseif ($this->source === 'er-a') {

            $full_url = 'https://v6.exchangerate-api.com/v6/' . $this->api_key . '/pair/' . $from_currency . '/' . $to_currency;
            $remote = new Remote();
            $result = $remote->getFileContents($full_url);
            if ($result === false) return false;
            $json_result = json_decode($result, true);
            $conversion_rate = $json_result['conversion_rate'];

        }

        return $conversion_rate;
    }
}
