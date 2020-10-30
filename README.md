# Litmus php sdk

## How to use
First, instantiate client with your username and password

$client = new LitmusClient('username', 'password');

Call resource needed. Chek services classes to see what methods are available.

$result = $client->instant->getSupportedEmailClients();

You can pass array url or query params with
$params['query'] = [array of url params]
$params['post'] = [array of post params]
