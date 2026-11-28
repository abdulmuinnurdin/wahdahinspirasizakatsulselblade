<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        return view('master-data.countries');
    }
}
