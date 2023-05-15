<?php

use App\Core\Router;
use App\Core\Request;
use App\Controller\taskcontroller;



require 'init.php';


Router::make()

      ->get('', [taskcontroller::class, 'index'])
      ->post('task/create', [taskcontroller::class, 'create'])
      ->get('task/delete', [taskcontroller::class, 'delete'])
      ->get('task/update', [taskcontroller::class, 'update'])
      ->resolve(Request::uri(), Request::method());







?>
