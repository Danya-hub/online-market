<?php

namespace App\Http\Controllers;

use App\View\ViewModels\HomeViewModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("index", new HomeViewModel());
    }
}
