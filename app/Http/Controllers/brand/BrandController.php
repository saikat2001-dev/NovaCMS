<?php

namespace App\Http\Controllers\brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandController extends Controller
{
    public function showCreateForm() {
        return view('brand.create');
    }

    public function storeBrand(\Illuminate\Http\Request $request) {
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
                return redirect()->route('admin.dashboard')->with('success', 'Brand created successfully! Welcome to your dashboard.');
            }
            
            return redirect()->back()->withErrors('Failed to create brand. Please try again.')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function index() {
      $brands = Brand::getBrandsOfAdmin();
      return view('brand.index', compact('brands'));
    }

    public function createBrand($name) {
      $res = Brand::createBrand($name);
      return $res ? true : false;
    }

    public function getBrandsOfAdmin() {
      return Brand::getBrandsOfAdmin();
    }

    public function deleteBrand($id) {
      $res = Brand::deleteBrand($id);
      return $res ? true : false;
    }

    public function updateBrand($id, $name) {
      $res = Brand::updateBrand($id, $name);
      return $res ? true : false;
    }

    public function getBrand($id) {
      return Brand::getBrand($id);
    }
}