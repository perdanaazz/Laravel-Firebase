<?php

namespace App\Http\Controllers;

use App\Traits\Firebase;

class LandingPageController extends Controller
{
    use Firebase;

    public function index()
    {
        $this->setup('firebase/larabase-9bc91-firebase-adminsdk-z6131-cf34435f7d.json', 'https://larabase-9bc91-default-rtdb.asia-southeast1.firebasedatabase.app');
    }
}
