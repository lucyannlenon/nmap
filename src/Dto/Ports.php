<?php

namespace LLenon\Network\Nmap\Dto;

class Ports
{
    private array $ports = [];

    /**
     * @param Port[] | string[] $ports
     */
    public function __construct(
        array $ports = []
    )
    {
        foreach ($ports as $port) {
            if (! $port instanceof Port) {
                $port = new Port((int)$port);
            }
            $this->addPorts($port);

        }
    }

    private function addPorts(Port $port): void
    {
        $this->ports[] = $port;
    }

    public function getPorts(): array
    {
        return $this->ports;
    }

    public function __toString(): string
    {
        if (empty($this->ports))
            return '-';

        return implode(',', $this->ports);
    }


}