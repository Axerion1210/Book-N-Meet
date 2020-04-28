<?php

Namespace App\Models;

use Phalcon\Mvc\Model;

class Reservation extends Model
{
    // variables
    public $id;
    public $RoomID;
    public $reserveDate;
    public $start_time;
    public $end_time;
    public $price;
    public $userID;
    public $paid;
}