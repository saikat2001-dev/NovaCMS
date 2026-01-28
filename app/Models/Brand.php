<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Auth;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner',
    ];

    public static function createBrand($name)
    {
        $user = Auth::getUser();
        
        if (!$user) {
            throw new \Exception('You must be logged in to create a brand.');
        }

        return DB::transaction(function () use ($name, $user) {
            // 1. Create the Brand
            $brandId = DB::table('brands')->insertGetId([
                'name' => $name,
                'owner' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (!$brandId) {
                throw new \Exception('Failed to create brand.');
            }

            // 2. Update the User's role brand_id association
            DB::table('user_role')->where('user_id', $user->id)->update([
                'brand_id' => $brandId,
                'updated_at' => now(),
            ]);

            return $brandId;
        });
    }

    public static function getBrandsOfAdmin(){
      return DB::table('brands')->where('owner', Auth::getUser()->id)->get();
    }

    public static function deleteBrand($id){
      return DB::table('brands')->where('id', $id)->delete();
    }

    public static function updateBrand($id, $name){
      return DB::table('brands')->where('id', $id)->update([
        'name' => $name,
        'updated_at' => now(),
      ]);
    }

    public static function getBrand($id){
      return DB::table('brands')->where('id', $id)->first();
    }
}
