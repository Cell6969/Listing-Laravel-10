<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $iconPath = $this->uploadImage($request, 'icon', null, '/uploads/category/icon');
        $imagePath = $this->uploadImage($request, 'image', null, '/uploads/category/image');

        $category = new Category();
        $category->icon = $iconPath;
        $category->image = $imagePath;
        $category->name = $request->input('name');
        $category->show_at_home = $request->input('show_at_home');
        $category->status = $request->input('status');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        toastr()->success('Category created successfully');
        return redirect()->route('admin.category.index');
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
    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $iconPath = $this->uploadImage($request, 'icon', $category->icon, '/uploads/category/icon');
        $imagePath = $this->uploadImage($request, 'image', $category->image, '/uploads/category/image');

        $category->icon = !empty($iconPath) ? $iconPath : $category->icon;
        $category->image = !empty($imagePath) ? $imagePath : $category->image;
        $category->name = $request->input('name');
        $category->show_at_home = $request->input('show_at_home');
        $category->status = $request->input('status');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        toastr()->success('Category updated successfully');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $category = Category::findOrFail($id);
        $this->deleteImage($category->icon);
        $this->deleteImage($category->image);
        $category->delete();

        toastr()->success('Success delete category');
        return response([
            'status' => 'success',
            'message' => 'Success delete category'
        ]);
    }
}
