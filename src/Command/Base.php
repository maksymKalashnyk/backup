<?php

namespace maksymKalashnyk\Backup\Command;

use maksymKalashnyk\Backup\Builder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class Base extends Command
{
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        parent::__construct();
    }

    public function getDatabase()
    {
        $config = Config::get('database.connections.mysql');
        return $this->builder->getDatabase($config);
    }
}
