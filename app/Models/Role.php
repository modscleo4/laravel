<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = config('database.default');
    }
}
