<?php

Namespace App\Models;

use Phalcon\Mvc\Model;

class Rooms extends Model
{
    // variables
    public $id;
    public $location;
    public $name;
    public $capacity;
    public $description;
    public $hourPrice;
}