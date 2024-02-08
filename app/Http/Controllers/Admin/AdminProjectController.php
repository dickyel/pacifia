<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Project::with(['user'])->orderByDesc('created_at');

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
                                    <a class="dropdown-item" href="' . route('project-admin.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="' . route('project-admin.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                })
                ->editColumn('panduan', function ($item) {
                    return Storage::url($item->panduan);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('pages.admin.project.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id.*' => 'nullable|exists:users,id',
            'title.*' => 'required',
            'desc.*' => 'required',
            'additional_info.*' => 'nullable',
            'link_demo.*' => 'required|string',
            'panduan.*' => 'required|file|mimes:pdf|max:500|min:100',
            'link_hubungi.*' => 'required',
            'liris.*' => 'required',
        ]);

        foreach ($validatedData['title'] as $key => $title) {
            // Simpan file panduan ke penyimpanan (storage)
            $panduanPath = $validatedData['panduan'][$key]->store('panduan_files', 'public');

            // Buat entri baru di tabel Competitions
            Project::create([
                
                'title' => $title,
                'desc' => $validatedData['desc'][$key],
                'additional_info' => $validatedData['additional_info'][$key],
                'link_demo' => $validatedData['link_demo'][$key],
                'panduan' => $panduanPath,
                'link_hubungi' => $validatedData['link_hubungi'][$key],
                'liris' => $validatedData['liris'][$key],
            ]);
        }

        return redirect()->route('project-admin.index');
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
        $item = Project::findOrFail($id);
        $users = User::all();

        return  view('pages.admin.project.edit',[
            'item' => $item,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Project::findOrFail($id);
    
        $request->validate([
            'panduan.*' => 'required|file|mimes:pdf|max:500|min:100',
        ]);
    
        if ($request->hasFile('panduan')) {
            $data['panduan'] = $request->file('panduan')->store('panduan_files', 'public');
        }
    
        $item->update($data);
    
        return redirect()->route('project-admin.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $item = Project::findOrFail($id);

        $item->delete();

        return redirect()->route('project-admin.index');
    }
}
