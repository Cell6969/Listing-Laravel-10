<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LocationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationStoreRequest;
use App\Http\Requests\Admin\LocationUpdateRequest;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LocationDataTable $dataTable): View | JsonResponse
    {
        return $dataTable->render('admin.location.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request): RedirectResponse
    {
        $location = new Location();
        $location->name = $request->input('name');
        $location->slug = Str::slug($request->input('name'));
        $location->show_at_home = $request->input('show_at_home');
        $location->status = $request->input('status');

        $location->save();

        toastr()->success('Success create location');

        return redirect()->route('admin.location.index');
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
    public function edit(int $id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, int $id): RedirectResponse
    {
        $location = Location::findOrFail($id);
        $location->name = $request->input('name');
        $location->slug = Str::slug($request->input('name'));
        $location->show_at_home = $request->input('show_at_home');
        $location->status = $request->input('status');
        $location->save();

        toastr()->success('Success update location');

        return redirect()->route('admin.location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            Location::findOrFail($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => "Deleted location successfully"
            ]);
        } catch (\Exception $e) {
            logger($e);
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
