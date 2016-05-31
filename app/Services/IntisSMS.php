<?php
/**
 * Created by PhpStorm.
 * User: joker
 * Date: 22.10.14
 * Time: 11:29.
 *
 * Класс для работы с IntisSMS
 */

namespace App\Services;

class IntisSMS
{
    /**
     * @var string Логин пользователя
     */
    public static $login = 'falconediting';
    /**
     * @var string Ключ API
     */
    public static $apikey = 'd7bb6469f82c8469ccd2e356fb12e3914b2ca7c9';
    /**
     * @var string Идентификатор отправителя (одобренный)
     */
    public static $sender = 'FalconEdit';

    /**
     * Метод инициализации.
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Проверка баланса.
     *
     * @return mixed
     */
    public function balance()
    {
        $params = array(
            'timestamp' => $this->timestamp(),
            'login' => self::$login,
            'return' => 'json',
        );

        $sign = $this->signature($params);

        $params['signature'] = $sign;

        $arr = json_decode($this->request('https://new.sms16.ru/get/balance.php', $params), true);

        return $arr['money'];
    }

    /**
     * Запрашивает метку времени.
     *
     * @return mixed Метка времени
     */
    private static function timestamp()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://new.sms16.ru/get/timestamp.php');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Bot (https://falconediting.com)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    /**
     * Формирование подписи.
     *
     * @param $params Параметры запроса
     *
     * @return string Подпись
     */
    private static function signature($params)
    {
        ksort($params);
        reset($params);

        return md5(implode($params).self::$apikey);
    }

    /**
     * Запрос по HTTPS.
     *
     * @param $url  Ссылка
     * @param $body Тело запроса
     *
     * @return mixed Ответ
     */
    private static function request($url, $body)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($body));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Bot (https://falconediting.com)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    /**
     * Отправка сообщения.
     *
     * @param $number Номер
     * @param $text   Текст
     *
     * @return mixed ID нового сообщения
     */
    public function send($number, $text)
    {
        $params = array(
            'login' => self::$login,
            'phone' => $number,
            'text' => $text,
            'sender' => self::$sender,
            'timestamp' => self::timestamp(),
            'return' => 'json',
        );

        $sign = self::signature($params);

        $params['signature'] = $sign;

        $res = json_decode(self::request('https://new.sms16.ru/get/send.php', $params), true);

        //$res = $res[$number]['id_sms'];

        return $res;
    }

    /**
     * Запрос статуса сообщения.
     *
     * @param $id ID сообщения
     *
     * @return mixed Статус сообщения
     */
    public function status($id)
    {
        $params = array(
            'login' => $this->login,
            'timestamp' => $this->timestamp(),
            'state' => $id,
        );

        $sign = $this->signature($params);

        $params['signature'] = $sign;

        $res = json_decode($this->request('https://new.sms16.ru/get/status.php', $params), true);

        return $res[$id];
    }

    public function statistic($data = null)
    {
        $params = array(
            'timestamp' => $this->timestamp(),
            'login' => self::$login,
            'return' => 'json',
            'month' => ($data == null) ? date('Y-m') : $data,
        );

        //dd($params);
        $sign = $this->signature($params);

        $params['signature'] = $sign;

        $arr = json_decode($this->request('https://new.sms16.ru/get/stat_by_month.php', $params), true);

        return $arr;
    }
}
