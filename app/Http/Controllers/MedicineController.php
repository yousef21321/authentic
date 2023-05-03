<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Medicine;
use Illuminate\Http\Request;



class MedicineController extends Controller
{

    //To be the website secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index')->with('medicines', $medicines);
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image',
            'medicine_name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $newPhotoName = time() . '_' . $request->photo->getClientOriginalName();
        $request->photo->move(public_path('upload/medicine'), $newPhotoName);

        $medicine = Medicine::create([
            'user_id' => auth()->id(),
            'medicine_name' => $request->medicine_name,
            'photo' => 'upload/medicine/' . $newPhotoName,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function show(Medicine $medicine)
    {
        return view('medicines.show')->with('medicine', $medicine);
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);

        return view('medicines.edit', compact('medicine'));
    }


    public function update(Request $request,$id)
    {
        $Medicine =Medicine::find($id);
        $Medicine->medicine_name =$request->input('medicine_name');
        $Medicine->price =$request->input('price');
        $Medicine->description =$request->input('description');
        $Medicine->photo =$request->input('photo');
        $Medicine->update();
        return redirect('/medicines')->with('success', 'Medicine updated successfully!');


    }
    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect()->back();
    }
}
