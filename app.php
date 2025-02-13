<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require dirname( __FILE__ ) . '/vendor/autoload.php';

use Dice\Socket;

$Port = 32400;

echo "Starting non-secure WebSocket on port: {$Port}\n";

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Socket()
        )
    ),
    $Port
);


$server->run();