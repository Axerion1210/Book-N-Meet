<?php
declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    // Implement common logic
    public function onConstruct()
    {
        $this->assets->addCss("https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900");
        $this->assets->addCss("https://fonts.googleapis.com/css?family=Nunito:400,300");

        $this->assets->addCss("css/bootstrap.min.css", true);
        $this->assets->addCss("css/flex-slider.css");
        $this->assets->addCss("css/font-awesome.css");
        $this->assets->addCss("css/owl.carousel.css");
        $this->assets->addCss("css/templatemo-art-factory.css");
        $this->assets->addCss("css/form.css");
        
        $this->assets->addJs("js/bootstrap.min.js", true);
        $this->assets->addJs("js/custom.js");
        $this->assets->addJs("js/imgfix.min.js");
        $this->assets->addJs("js/jquery.counterup.min.js");
        // $this->assets->addJs("js/jquery-2.1.0.min.js");
        $this->assets->addJs("js/owl-carousel.js");
        // $this->assets->addJs("js/popper.js");
        $this->assets->addJs("js/scrollreveal.min.js");
        $this->assets->addJs("js/waypoints.min.js");

        $this->assets->addJs("vendor/jquery/jquery-3.2.1.min.js");
        $this->assets->addJs("vendor/bootstrap/js/popper.js");
        $this->assets->addJs("vendor/bootstrap/js/bootstrap.min.js");
    }
}
