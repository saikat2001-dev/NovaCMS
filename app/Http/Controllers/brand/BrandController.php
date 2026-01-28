<?php

namespace App\Http\Controllers\brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function createBrand($name) {
      $res = DB::table('brands')->insert([
        'name' => $name,
        'owner' => Auth::getUser()->id,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      return $res ? true : false;
    }

    public function getBrandsOfAdmin() {
      return DB::table('brands')->where('owner', Auth::getUser()->id);
    }

    public function deleteBrand($id) {
      $res = DB::table('brands')->where('id', $id)->delete();
      return $res ? true : false;
    }

    public function updateBrand($id, $name) {
      $res = DB::table('brands')->where('id', $id)->update([
        'name' => $name,
        'updated_at' => now(),
      ]);
      return $res ? true : false;
    }

    public function getBrand($id) {
      return DB::table('brands')->where('id', $id)->first();
    }
}