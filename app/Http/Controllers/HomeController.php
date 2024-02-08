<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $projects = Project::with('galleries')->get();
        return view('pages.home',[
            'projects' => $projects
        ]);
    }

  
}
