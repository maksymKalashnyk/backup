<?php
namespace maksymKalashnyk\Backup\Database;

class MySqlDatabase
{
    protected $username;
    protected $password;
    protected $database;
    protected $count;

    public function __construct($username, $password, $database, $count)
    {
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->count = $count;
    }

    public function dump()
    {
        $command = sprintf(
            'mysqldump --user=%s --password=%s %s > "%s%s"',
            $this->username,
            $this->password,
            $this->database,
            database_path() . '/dump/',
            date('Y-m-d H:i:s') . '.sql'
        );

        return exec($command);
    }

    public function getCount()
    {
        return $this->count;
    }
}
