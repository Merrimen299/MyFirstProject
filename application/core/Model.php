<?php

namespace application\core;

use application\db\Db;

class Model
{
    public Db $db;

    public function __construct()
    {
        $this->db = new Db;
    }
}