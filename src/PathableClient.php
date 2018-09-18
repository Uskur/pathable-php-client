<?php

namespace Uskur\PathableClient;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class PathableClient extends GuzzleClient {
    
    public static function create($config = []) {
        // Load the service description file.
        $service_description = json_decode(file_get_contents(__DIR__ . '/../service.json'), TRUE);
        $service_description['baseUrl'] .= "{$config['community_id']}/";
        //$service_description['baseUrl'] = "https://private-4fd5b-pathable.apiary-mock.com/v1/communities/{$config['community_id']}/";
        $description = new Description($service_description);
        
        // Creates the client and sets the default request headers.
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Api-Token' => $config['api_token'],
            ],
            'query'=>[
                'auth_token' => $config['auth_token']
            ]            
        ]);
        
        return new static($client, $description, NULL, NULL, NULL, $config);
    }
}
