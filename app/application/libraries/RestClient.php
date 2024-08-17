<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RestClient
{
    public function get($url, array $headers = [])
    {
        return $this->request($url, 'GET', null, $headers);
    }

    public function post($url, $data, $headers = [])
    {
        return $this->request($url, 'POST', $data, $headers);
    }

    public function put($url, $data, $headers = [])
    {
        return $this->request($url, 'PUT', $data, $headers);
    }

    public function delete($url, $headers = [])
    {
        return $this->request($url, 'DELETE', null, $headers);
    }

    private function request($url, $method, $data = null, $headers = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if (!empty($data)) {
            $jsonData = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

            $headers[] = 'Content-Type: application/json';
        }

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            show_error('API Not Response');
        }

        curl_close($ch);

        return json_decode($response);
    }
}
