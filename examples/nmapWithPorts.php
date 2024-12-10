<?php

use LLenon\Network\Nmap\Dto\Ports;
use LLenon\Network\Nmap\Nmap;
use LLenon\Network\Nmap\NmapCommand;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Create an instance of Dotenv
$dotenv = new Dotenv();

// Load .env file from the project root
$dotenv->loadEnv(__DIR__ . '/../.env');

$nmap = new Nmap();
$nmapCommand = new NmapCommand($nmap);
$ports = new Ports([
    '8080', '80'
]);
 $return =$nmapCommand->run('127.0.0.1', $ports);

dd($return);
/**
 * ^ LLenon\Network\Nmap\Dto\Ports^ {#11
 * -ports: array:2 [
 * 0 => LLenon\Network\Nmap\Dto\Port^ {#9
 * -port: 80
 * -state: "open"
 * }
 * 1 => LLenon\Network\Nmap\Dto\Port^ {#10
 * -port: 8080
 * -state: "closed"
 * }
 * ]
 */