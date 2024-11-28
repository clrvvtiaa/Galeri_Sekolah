<?php

namespace App\Http\Controllers;
use App\Models\Category;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'title' => 'Kategori',
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Tambah Kategori',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
        ]);

        //Simpan data ke dlm table kategori
        Category::create([
            'title' => $request->title,
        ]);

        return redirect('/categories')->with('succes', 'Kategori berhasil ditambahkan');
    }
 
    public function edit(Category $category)
{
    return view('admin.categories.edit', [
        'title' => 'Edit Kategori',
        'category' => $category, // Mengirim variabel sebagai 'category'
    ]);
}


    public function update(Request $request, Category $category)
    {
        // validate request
        $request->validate([
            'title' => 'required',
        ]);

        // update data
        $category->update([
            'title' => $request->title,
        ]);

        // Redirect ke halaman 
        return redirect('/categories')->with('success', 'Kategori berhasil  diupdate');
    }

    public function destroy(Category $category)
    {
        // Hapus data
        $category->delete();

        // Redirect ke halaman
        return redirect('/categories')->with('success', 'Kategori berhasil  dihapus');
    }
}
