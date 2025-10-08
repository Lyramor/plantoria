<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function index()
    {
        $search = request('search');
        $category = request('category');
        
        $plants = Plant::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                           ->orWhere('scientific_name', 'like', '%' . $search . '%');
            })
            ->when($category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->latest()
            ->paginate(12);
            
        $categories = Category::all();
        
        return view('plants.index', compact('plants', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.plants.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'scientific_name' => 'required|string|max:150',
            'description' => 'required|string',
            'benefits' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $plant = new Plant($request->except('image'));
        
        if ($request->hasFile('image')) {
            $plant->image = $request->file('image')->store('plants', 'public');
        }
        
        $plant->save();

        return redirect()->route('plants.index')->with('success', 'Tanaman berhasil ditambahkan!');
    }

    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        $categories = Category::all();
        return view('admin.plants.edit', compact('plant', 'categories'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'scientific_name' => 'required|string|max:150',
            'description' => 'required|string',
            'benefits' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $plant->fill($request->except('image'));
        
        if ($request->hasFile('image')) {
            if ($plant->image) {
                Storage::disk('public')->delete($plant->image);
            }
            $plant->image = $request->file('image')->store('plants', 'public');
        }
        
        $plant->save();

        return redirect()->route('plants.index')->with('success', 'Tanaman berhasil diperbarui!');
    }

    public function destroy(Plant $plant)
    {
        if ($plant->image) {
            Storage::disk('public')->delete($plant->image);
        }
        
        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Tanaman berhasil dihapus!');
    }
}
