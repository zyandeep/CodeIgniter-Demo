<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mongo_model extends CI_Model
{
    private $host = '127.0.0.1';
    private $port = '27017';
    private $client;

    public function __construct()
    {
        parent::__construct();

        $this->client = new MongoDB\Client("mongodb://$this->host:$this->port");
    }

    public function get_comments()
    {
        $users = $this->client->my_db->users;
        $cursor = $users->find([],
            [
                'projection' => ['_id' => 0],
                'sort' => ['created_at' => -1],
            ]);

        $data = array();

        foreach ($cursor as $userDoc) {
            array_push($data, $userDoc);
        }

        return $data;
    }

    public function insert_comment($data = array())
    {
        $users = $this->client->my_db->users;

        $result = $users->insertOne($data);

        return ($result->getInsertedCount() > 0);

    }

}
