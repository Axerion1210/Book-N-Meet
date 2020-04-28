<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Models\Rooms;

class RoomsController extends ControllerBase
{

    public function indexAction()
    {
        $rooms = Rooms::find();
        $this->view->rooms = $rooms;
    }
    
}

