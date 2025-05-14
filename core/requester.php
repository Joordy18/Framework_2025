<?php


class Requester
{

    private $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function get($endpoint, $params = [])
    {
        $url = $this->baseUrl . '/' . $endpoint . '?' . http_build_query($params);
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    public function post($endpoint, $data = [])
    {
        $url = $this->baseUrl . '/' . $endpoint;
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    public function delete($endpoint, $data = [])
    {
        $url = $this->baseUrl . '/' . $endpoint;
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'DELETE',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
}