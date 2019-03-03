<?php
/**
 * Created by PhpStorm.
 * User: mucap
 * Date: 03/03/2019
 * Time: 19:09
 */

namespace Infrastructure\Api\Feegow;


use Curl\Curl;

class Base
{
    private $urlBase;
    private $token;

    /**
     * Base constructor.
     * @param $urlBase
     * @param $token
     */
    public function __construct($urlBase, $token)
    {
        $this->urlBase = $urlBase;
        $this->token = $token;
    }

    public function get($url, $params = [])
    {
        $curl = new Curl();
        $curl->setHeader('Content-Type', 'application/json');
        $curl->setHeader('x-access-token', $this->token);

        $result = $curl->get($this->urlBase . $url, $params);
        return $result->response;
    }
}