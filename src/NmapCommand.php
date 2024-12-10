<?php

namespace LLenon\Network\Nmap;

use LLenon\Network\Nmap\Dto\Port;
use LLenon\Network\Nmap\Dto\Ports;

class NmapCommand
{

    public function __construct(
        private readonly Nmap $nmap,
    )
    {
    }

    public function run(string $host, ?Ports $ports = null): Ports
    {
        $ports = $ports ? (string)$ports : '-';
        $cmd = "$this->nmap -p{$ports} $host";

        $data = `$cmd`;
        return$this->getData($data);
    }

    private function getData(mixed $data): Ports
    {
        $lines = explode("\n", $data);
        $ports = [];

// Skip the header line
        foreach (array_slice($lines, 1) as $line) {
            // Use regular expression to extract fields
            if (preg_match('/^(\d+)\/\w+\s+(\w+)\s+(.+)/', $line, $matches)) {
              $port =  new Port((int)$matches[1],$matches[2]);
              $ports[] = $port;
            }
        }
        return new Ports($ports);
    }
}