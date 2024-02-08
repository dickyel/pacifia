<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\ProjectGallery;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            $query = ProjectGallery::with(['project']);
    
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                            
                                    <form action="' . route('gallery-admin.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                })
                ->editColumn('image_project', function ($item) {
                    return $item->image_project ? '<img src="' . Storage::url($item->image_project) . '" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action', 'image_project'])
                ->make();
        }
    
        return view('pages.admin.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $projects = Project::all();
     
        return view('pages.admin.gallery.create',[
            'projects' => $projects,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'project_id.*' => 'required|exists:projects,id',
           
            'image_project.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Hanya menerima file PDF
         
        ]);

        foreach ($validatedData['image_project'] as $key => $image) {
       
            $imagePath = $image->store('gallery_files', 'public');

            // Buat entri baru di tabel Competitions
            ProjectGallery::create([
                'image_project' => $imagePath,
                'project_id' => $validatedData['project_id'][$key],
                
                
            ]);
        }

        return redirect()->route('gallery-admin.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string  $id)
    {
        $item = ProjectGallery::findOrFail($id);

        $item->delete();

        return redirect()->route('gallery-admin.index');
        
    }
}
