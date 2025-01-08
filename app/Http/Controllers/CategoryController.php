<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view("pages.category.index", ['categories' => Category::all()]);

    }

    public function edit($id): View
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', ['category' => $category]);
    }
    public function create(): View
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function update(Request $request, $id): RedirectResponse
    {

        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('admin.categories.index')->with('failed', 'Category not found.');
        }

        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $category->name = $request->name ?? $category->name;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.categories.index')
                ->with('success', 'Category is deleted successfully.');
        } else {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Cannot Delete Category.');
        }
    }
}
