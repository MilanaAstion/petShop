<?php
include "vendor/autoload.php";
include "libs/User.php";
include "models/User.php";

use App\Libs\User as U;
use App\Models\User;

$user = new U;
$user2 = new User;
dd($user2);