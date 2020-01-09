<?php

namespace Gldrenthe89\KiyohPhpClient;

class KiyohApi
{
    private $baseUrl;
    private $headers;
    private $apiKey;

    /**
     * KiyohApi constructor.
     *
     * @param string $baseUrl ** www.kiyoh.com of www.klantenvertellen.nl
     * @param string $apiKey ** hash provided by Kiyoh or Klantenvertellen
     */
    function __construct(string $baseUrl, string $apiKey) {
        $this->baseUrl   =   $baseUrl;
        $this->apiKey    =   $apiKey;
        $this->headers   =   ['X-Publication-Api-Token: '.$this->apiKey];
    }

    /**
     * This operation is used to get the average scores of rating questions of a location group
     *
     * @return mixed
     */
    public function getGroupStatistics() {
        $fullUrl = 'https://'.$this->baseUrl.'/v1/publication/review/external/group/statistics';
        return $this->apiCall($fullUrl)[0];
    }

    /**
     * This operation is used to get the average scores of rating question of a location.
     *
     * @param int $locationId ** provided by Kiyoh or Klantenvertellen. of found in respective dashboards.
     * @return mixed
     */
    public function getLocationStatistics(int $locationId) {
        $fullUrl = 'https://'.$this->baseUrl.'/v1/publication/review/external/location/statistics?locationId='.$locationId;
        return $this->apiCall($fullUrl);
    }

    /**
     * Perform the review invite trough a api POST call
     *
     * @param $fullUrl
     * @return mixed|string
     * @throws \Exception
     */
    public function sendReviewInviteJson(array $params) {
        $fullUrl = 'https://'.$this->baseUrl.'/v1/invite/external';
        array_push($this->headers, 'Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT,'10');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        $curlResp = curl_exec($ch);
        $curlError = curl_error($ch);
        curl_close($ch);

        if($curlError != '') {
            $result = $curlError;
        } else {
            $result = json_decode($curlResp, false);
        }

        if(isset($result->errorCode)) {
            throw new \Exception($curlResp);
        }

        return $result;
    }

    /**
     * Perform the api call GET method
     *
     * @param $fullUrl
     * @return bool|string
     */
    private function apiCall(string $fullUrl) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT,'10');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        $curlResp = curl_exec($ch);
        $curlError = curl_error($ch);
        curl_close($ch);

        if($curlError != '') {
            $result = $curlError;
        } else {
            $result = json_decode($curlResp, false);
        }

        return $result;
    }

}
