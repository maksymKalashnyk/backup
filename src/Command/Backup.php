<?php
namespace maksymKalashnyk\Backup\Command;

use maksymKalashnyk\Backup\Builder;

class Backup extends Base
{
    protected $name = 'db:backup';

    public function __construct(Builder $builder)
    {
        parent::__construct($builder);
    }

    public function handle()
    {
        var_dump(config('db.username')) ;
        $database = $this->getDatabase();
        $this->CheckFolder();
        $this->ManageFiles($database->getCount());
        return $database->dump();
    }

    protected function CheckFolder()
    {
        $path = database_path() . '/dump';

        if (! is_dir($path)) {
            mkdir($path);
        }
    }

    protected function ManageFiles($count)
    {
        $dir = database_path() . '/dump/';
        $scan = array_diff(scandir($dir), ['..', '.']);
        echo count($scan) + 1 . PHP_EOL;
        if (count($scan) >= $count) {
            unlink($dir . '/' . $scan[2]);
        }
        var_dump($scan) . PHP_EOL;
    }
}
