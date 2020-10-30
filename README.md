# Litmus php sdk

## How to use
First, instantiate client with your username and password

$client = new LitmusClient('username', 'password');

Call resource needed. Check services classes to see what endpoints methods are available.

example: get list of support email via instant enndpoint
$result = $client->instant->getSupportedEmailClients();


You can pass array url parameters or post parameters when endpoints allow you to. Yous should refer to official litmus configuration to know availiable options
$params['query'] = [array of url params]
$params['post'] = [array of post params]
