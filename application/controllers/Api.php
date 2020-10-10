<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Api extends CI_Controller
{

    public function __construct()
    {
        // MUST call parent's constructor
        parent::__construct();

        // load models
        $this->load->model('Comments_model');

    }

    // Get all the comments
    public function comments()
    {
        // Only accept GET request

        if ($this->input->method(true) === 'GET') {

            $data_arr = $this->Comments_model->get_comments();

            $this->send_response($data_arr, 200);

        } else {

            // Send method not allowed
            $this->send_response(array('error' => 'Method Not Allowed'), 405);
        }
    }

    // Insert a comment
    public function comment()
    {
        // Only accept POST request

        if ($this->input->method(true) === 'POST') {
            $json_str = $this->input->raw_input_stream;

            $this->Comments_model->insert_comment(json_decode($json_str, true));

            $this->send_response(array('msg' => 'comment posted'), 201);

        } else {

            // Send method not allowed
            $this->send_response(array('error' => 'Method Not Allowed'), 405);
        }
    }

    /*
    Make External API Calls using Guzzle HTTP Library
     */

    public function dashboard()
    {

        // Create a client with a base URI
        try {

            $client = new GuzzleHttp\Client(
                ['base_uri' => 'http://103.8.249.17/mongo/api/']
            );

            $response = $client->request('GET', 'res');

            // $response = $client->get('/res');

            if ($response->getStatusCode() === 200) {

                $body = $response->getBody();

                $this->send_response(json_decode($body, true), 200);
            } else {
                // Handler HTTP Error
            }

        } catch (RequestException $ex) {
            // echo Psr7\str($ex->getRequest());
            echo Psr7\str($ex->getResponse());
        }
    }

    /*
    Send JSON output to Client
     */

    private function send_response($data = [], $code = 200)
    {
        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT));
    }
}
