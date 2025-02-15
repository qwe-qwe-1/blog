<?php

use App\Models\User;

return [
    'user-model' => User::class,
    'db-connection' => 'sqlite',
    'start-table-with' => 'package_blog_',
];