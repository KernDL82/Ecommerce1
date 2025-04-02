<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * this function pulls all product data to the $product_data function then parsed to the admin.default.etc page.
     * products can be viewed online with this block of code.
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
        return view('admin.default.products.admin-add-products');
    }

    /**
     * Store a newly created resource in storage.
     * Block of code used to create new data on the admin\products\edit add new item.
     * 'Product' creates a new product in the database
     * $validate data validates all data, imagehelper uploads images.
     */
    public function store(CreateProductRequest $request)
    {
        $validatedData = $request->validated();

        $imageHelper = new ImageHelper();
        $validatedData['image_path'] = '/images/products/';
        $validatedData['image_name'] = $imageHelper->imageUpload($request->file('image_upload'));
        Product::create($validatedData);

        return redirect()->route('admin.products.index')->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * Loads the edit page.
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
            $imageHelper->removeExistingImage($product->image_name);
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
