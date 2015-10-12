<?php namespace App\Services;


use Cache;
use Carbon\Carbon;
use GuzzleHttp\Client;

class CurrencyRate
{

    public $date_req1;

    public $date_req2;

    public $VAL_NM_RQ;

    public $Attempts = 0;

    public function __construct($date_req1 = null, $date_req2 = null, $VAL_NM_RQ = null)
    {
        $this->date_req1 = (!is_null($date_req1)) ? $date_req1 : date("d.m.Y");;
        $this->date_req2 = (!is_null($date_req2)) ? $date_req2 : date("d.m.Y");;
        $this->VAL_NM_RQ = (!is_null($VAL_NM_RQ)) ? $VAL_NM_RQ : 'R01235'; // Доллар
    }

    public function getRecord()
    {
        $result = $this->get();
        return $result['Record'];
    }

    public function get()
    {
        if (Cache::has('ValCurs-' . $this->VAL_NM_RQ)) {
            return Cache::get('ValCurs-' . $this->VAL_NM_RQ);
        } else {
            return $this->sendQuery();
        }

    }

    public function sendQuery()
    {
        $postvars = [
            'date_req1' => $this->date_req1,
            'date_req2' => $this->date_req2,
            'VAL_NM_RQ' => $this->VAL_NM_RQ,
        ];

        $client = new Client([
            'base_uri' => 'http://www.cbr.ru/scripts/',
            'timeout' => 10.0,
            'verify' => false,
            'form_params' => $postvars,
        ]);

        $query = $client->post('XML_dynamic.asp')
            ->getBody()
            ->getContents();


        $xml = simplexml_load_string($query);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);


        if (!empty($array['Record']['Value']))
            Cache::put('ValCurs-' . $this->VAL_NM_RQ, $array, Carbon::now()->addMinutes(60));

        return $array;

    }

    public function getOneRecord()
    {
        do {
            $result = $this->get();

            if ($this->Attempts == 5) {
                dd($this->Attempts, $this->date_req1, $this->date_req2, $result);
            }


        } while (!$this->validFreeDay($result));


        return $result['Record']['Value'];
    }


    function validFreeDay($result)
    {
        if (!isset($result['Record']['Value'])) {
            $this->Attempts++;
            $MinusDate = (60 * 60 * 24) * $this->Attempts;
            $this->date_req1 = date("d.m.Y", time() - $MinusDate);
            $this->date_req2 = date("d.m.Y", time() - $MinusDate);
            return false;
        } else {
            return true;
        }
    }





}