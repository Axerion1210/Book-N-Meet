<?php
declare(strict_types=1);

namespace App\Controllers;

class LogoutController extends ControllerBase
{
    public function indexAction()
    {
        $this->session->destroy();
        return $this->response->redirect('/');
    }
}

