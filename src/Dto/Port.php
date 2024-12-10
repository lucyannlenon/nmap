<?php

namespace LLenon\Network\Nmap\Dto;

class Port
{


    public function __construct(
        private int    $port,
        private string $state = "NotChecked"
    )
    {
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function __toString(): string
    {
        return (string)$this->port;
    }


}