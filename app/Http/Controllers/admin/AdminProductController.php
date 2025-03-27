<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_data = Product::all();

        return view('admin.default.products.admin-view-products', compact('product_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findOrFail($id);

        return view('admin.default.products.admin-edit-products', compact('data'));
    }

    /**
     * Update the specified resource in storage.making edit on the online webpage will actually affect the local database.can also assign and image with this code.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);
        $imageHelper = new ImageHelper();

        if ($request->hasFile('image_upload')) {
            $validateData['image_name'] = $imageHelper->imageUpload($request->file('image_upload'));
        }

        $product->update($validatedData);

        return redirect()->route('admin.products.edit', ['product' => $id])->with('message', 'Product updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
