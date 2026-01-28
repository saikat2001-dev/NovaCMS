<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function showCreateForm()
    {
        return view('brand.create');
    }

    public function showEditForm($id)
    {
        $brand = Brand::getBrand($id);
        if (! $brand) {
            return redirect()->route('brand.index')->withErrors('Brand not found.');
        }

        return view('brand.create', compact('brand'));
    }

    public function storeBrand(\Illuminate\Http\Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:brands,name'],
        ], [
            'name.required' => 'Brand name is required',
            'name.unique' => 'Brand name already taken',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $brandId = Brand::createBrand($request->name);

            if ($brandId) {
                return redirect()->route('brand.index')->with('success', 'Brand created successfully!');
            }

            return redirect()->back()->withErrors('Failed to create brand. Please try again.')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function index()
    {
        $brands = Brand::getBrandsOfAdmin();

        return view('brand.index', compact('brands'));
    }

    public function getBrandsOfAdmin()
    {
        return Brand::getBrandsOfAdmin();
    }

    public function deleteBrand($id)
    {
        $res = Brand::deleteBrand($id);
        if ($res) {
            return redirect()->route('brand.index')->with('success', 'Brand deleted successfully!');
        }

        return redirect()->back()->withErrors('Failed to delete brand. Please try again.')->withInput();
    }

    public function updateBrand(\Illuminate\Http\Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', "unique:brands,name,{$id}"],
        ], [
            'name.required' => 'Brand name is required',
            'name.unique' => 'Brand name already taken',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $res = Brand::updateBrand($id, $request->name);
            
            if ($res) {
                return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
            }
            
            return redirect()->back()->withErrors('Failed to update brand. Please try again.')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function getBrand($id)
    {
        return Brand::getBrand($id);
    }
}
