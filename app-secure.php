<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require dirname(__FILE__) . '/vendor/autoload.php';

use Dice\Socket;

$Port = 32400;

echo "Starting secure WebSocket on port: {$Port}\n";

$server = new HttpServer(new WsServer(new Socket()));

$loop = \React\EventLoop\Factory::create();

$secure_websockets = new \React\Socket\Server('0.0.0.0:'.$Port, $loop);
$secure_websockets = new \React\Socket\SecureServer($secure_websockets, $loop, [
    'local_cert' => 'cert.pem',
    'local_pk' => 'privkey.pem',
    'verify_peer' => false,
    'verify_peer_name' => false,
]);

$secure_websockets_server = new \Ratchet\Server\IoServer($server, $secure_websockets, $loop);
$secure_websockets_server->run();

?>