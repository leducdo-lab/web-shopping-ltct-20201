<?php

namespace App\Library;

use App\TestProvider\HelloRepository;

class HelloClass implements HelloRepository
{
    public function showHelloWorld()
    {
        return "Hello World";
    }
}

?>
