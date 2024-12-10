<?php

namespace LLenon\Network\Nmap;

class Nmap
{
    private string $_command;

    public function __construct()
    {
        $this->setCommand();
    }

    /**
     * @return void
     */
    public function setCommand(): void
    {
        if (empty($_ENV['NMAP_COMMAND'])) {
            $this->_command = '/usr/bin/nmap';
            return;
        }
        $this->_command = $_ENV['NMAP_COMMAND'];

        $this->checkCommand() ;
    }

    public function getCommand(): string
    {
        return $this->_command;
    }

    public function __toString(): string
    {
       return $this->getCommand();
    }

    private function checkCommand(): void
    {
        if(!file_exists($this->_command)) {
            throw new \InvalidArgumentException("Invalid Nmap command `$this->_command`");
        }

        if(!is_executable($this->_command)) {
            throw new \InvalidArgumentException("Invalid Nmap command `$this->_command` not has executable permission");
        }
    }
}