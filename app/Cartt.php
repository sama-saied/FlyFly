<?php 
namespace Cartt\Facades;

use Illuminate\Support\Facades\Facade;

class Cartt extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'cartt';
    }
}