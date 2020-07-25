<?php
namespace App\Http\Controllers\Admin;

use App\V1\Categories\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoriesControllers extends Controller
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('adminlte::categories/list',['categories' => $categories]);
    }

    public function prestore(){
        return view('adminlte::categories/create',['category' => new Category()]);
    }

    public function store(){
        $category = new Category();
        $category->root = 1;
        $category->fill($this->request->all());

        if(!$errors = $category->isValid()) {
            return view('adminlte::categories/create', ['category' => $category, 'errors' => $errors]);
        }

        $category->save();
        return redirect()->route('adminCategories')->with('message', 'Recurso guardado');
    }

    public function update(Category $category){
        $category = Category::findOrFail($category);
        $category = $category->first();
        $category->fill($this->request->all());
        if(!$errors = $category->isValid()) {
            return view('adminlte::categories/edit', ['category' => $category, 'errors' => $errors]);
        }
        $category->save();

        return redirect()->route('adminCategories')->with('message', 'Recurso guardado');
    }

    public function show(Category $category){
        $category = Category::findOrFail($category);
        return view('adminlte::categories/edit',['category' => $category->first()]);
    }

    public function delete(Category $category){
        $category = Category::findOrFail($category);
        $category = $category->first();
        $category->forceDelete();

        return redirect()->route('adminCategories')->with('message', 'Recurso eliminado');
    }
}