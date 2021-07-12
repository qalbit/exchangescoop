<?php

namespace ExchangeScoop;

/**
 * Class for currency exchange rate
 */
class Exchange
{
    /**
     * Default variables
     *
     */
    protected $API_KEY = "";
    protected $BASE_CURRENCY = "";
    protected $BASE_URL = "https://v6.exchangerate-api.com/v6/";

    /**
     * Default constructor
     *
     * @param string $API_KEY = Get that from {https://app.exchangerate-api.com/sign-in}
     * @param string $BASE_CURRENCY
     */
    public function __construct($API_KEY, $BASE_CURRENCY = "USD")
    {
        $this->API_KEY         = $API_KEY;
        $this->BASE_CURRENCY   = $BASE_CURRENCY;
    }

    /**
     * Set base currency
     *
     * @param string $BASE_CURRENCY
     * @return void
     */
    public function setBaseCurrency($BASE_CURRENCY)
    {
        $this->BASE_CURRENCY = $BASE_CURRENCY;
    }

    /**
     * Retreive base currency
     *
     * @return string
     */
    public function getBaseCurrency()
    {
        return $this->BASE_CURRENCY;
    }


    /**
     * Get latest exchange rate for all currency
     *
     * @return array Currency List
     */
    public function getLatestExchangeRate()
    {
        $url = $this->BASE_URL . $this->API_KEY . "/latest/" . $this->BASE_CURRENCY;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);

        if( $response['result'] == "success" ) 
        {
            return $response['conversion_rates'];
        }
        else
        {
            return false;
        }
    }

    /**
     * Convert base currency into target currency 
     *
     * @param string $target INR, USD, GBP, AUD etc.
     * @param float $amount 10.00, 15.34, 123 etc.
     * @return float Converted Amount
     */
    public function convert($target, $amount)
    {
        $url = $this->BASE_URL . $this->API_KEY . "/pair/" . $this->BASE_CURRENCY . "/" . $target;
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);

        if( $response['result'] == "success" )
        {
            return $response['conversion_rate'] * $amount;
        }
        else
        {
            return 0;
        }
    }
}