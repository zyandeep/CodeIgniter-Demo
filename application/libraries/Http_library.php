<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Http_library
{

    const BASE_URL = 'http://103.8.249.17/mongo/api/';

    public function get_dashboard_data()
    {
        // Create a client with a base URI

        try {

            $client = new GuzzleHttp\Client(
                ['base_uri' => Http_library::BASE_URL]
            );

            $response = $client->request('GET', 'res');

            // $response = $client->get('/res');

            if ($response->getStatusCode() === 200) {

                $body = $response->getBody();

                return json_decode($body, true); // returns an Array
            }

        } catch (\Exception $ex) {

            return 'Network Error.'; // returns a String
        }
    }
}
