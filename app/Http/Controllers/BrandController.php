<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BrandController extends Controller
{
    public function getBrands()
    {
        return view('dynamic1', ['brands' => Brand::all()]);
    }
    public function getBrandsAdmin()
    {
        return view('admin/admin', ['brands' => Brand::all()]);
    }
    public function editBrand(Request $request)
    {
        $params = $request->only(['newName', 'newLogo', 'id']);
        $brand = Brand::find($params['id']);
        $params['newName'] ? $brand->name = $params['newName'] : null;
        $params['newLogo'] ? $brand->logo = $params['newLogo'] : null;
        $brand->save();

        return view('admin/admin', ['brands' => Brand::all()]);
    }
    public function addBrand(Request $request)
    {
        $params = $request->only(['newName', 'newLogo']);
        $brand = new Brand();
        $brand->name = $request['newName'];
        $brand->logo = $request['newLogo'];
        $brand->save();
        return view('admin/admin', ['brands' => Brand::all()]);
    }
    public function removeBrand($id)
    {
        Brand::find($id)->delete();
        return view('admin/admin', ['brands' => Brand::all()]);
    }
    public function removeAllBrands()
    {
        Brand::truncate();
        return view('admin/admin', ['brands' => Brand::all()]);
    }
}
