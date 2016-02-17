<?php namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Piece extends Facade{

	protected static function getFacadeAccessor() { 
        return 'App\Tools\Piece'; 
    }
}