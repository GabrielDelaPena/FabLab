<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('admin.index', [
            'products' => Product::all(),
            'students' => Student::all(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.products.edit', [
            'product' => Product::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->save();

        return redirect()->route('admin.index');
    }
}
