<?php
namespace App\Services;

use GuzzleHttp\Client;

class FeegowApiService
{
    private $apiKey;
    public $apiHost;

    public function __construct(Client $http)
    {
        $this->http = $http;
        $this->apiKey = env('FEEGOW_KEY');
        $this->apiHost = env('FEEGOW_API_HOST');
    }

    public function getResource(array $params)
    {
        $endPoint = $params['endpoint'];

        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'x-access-token' => $this->apiKey
            ]
        ];

        $url = $this->apiHost . $endPoint;
        $response = $this->http->get($url, $options);
        $content = $response->getBody()->getContents();

        return $content;
    }
}
