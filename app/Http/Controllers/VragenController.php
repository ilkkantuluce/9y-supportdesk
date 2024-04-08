<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VragenController extends Controller
{
    public function vragenPage()
    {
        return view('vragen'); // Assuming you have a view file named vragen.blade.php
    }
}
