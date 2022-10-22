<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getCars()
    {
        return view('dynamic2', ['cars' => Car::where('brandId', '=', $_GET['brand'])->get()]);
    }
    public function getCarsAdmin($id)
    {
        return view('admin/admin2', ['cars' => Car::where('brandId', '=', $id)->get(), 'brand' => $id]);
    }
    public function editCar($brandid, Request $request)
    {
        $params = $request->only(['newName', 'newImage', 'id']);
        $car = Car::find($params['id']);
        $params['newName'] ? $car->name = $params['newName'] : null;
        $params['newImage'] ? $car->image = $params['newImage'] : null;
        $car->save();

        return view('admin/admin2', ['cars' => Car::where('brandId', '=', $brandid)->get(), 'brand' => $brandid]);
    }
    public function addCar($brandid, Request $request)
    {
        $params = $request->only(['newName', 'newImage']);
        $car = new Car();
        $car->name = $request['newName'];
        $car->image = $request['newImage'];
        $car->brandId = $brandid;
        $car->save();
        return view('admin/admin2', ['cars' => Car::where('brandId', '=', $brandid)->get(), 'brand' => $brandid]);
    }
    public function removeCar($brandid, $carid)
    {
        Car::find($carid)->delete();
        return view('admin/admin2', ['cars' => Car::where('brandId', '=', $brandid)->get(), 'brand' => $brandid]);
    }
    public function removeAllCars($brandid)
    {
        Car::where('brandId', '=', $brandid)->delete();
        return view('admin/admin2', ['cars' => Car::where('brandId', '=', $brandid)->get(), 'brand' => $brandid]);
    }
}
