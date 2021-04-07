<?php

namespace maksymKalashnyk\Backup;

class Builder
{
    protected $database;
    
    public function getDatabase(array $config)
    {
        $this->database = new Database\MySqlDatabase(
            $config['username'],
            $config['password'],
            $config['database'],
            env('COUNT', 5)
        );

        return $this->database;
    }
}
