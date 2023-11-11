<?php

namespace App\Http\Controllers;

use App\Traits\Firebase;

class LandingPageController extends Controller
{
    use Firebase;

    public function index()
    {
        $this->setup($config_path, $database_uri);
    }
}
