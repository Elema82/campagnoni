<?php
namespace App\Http\Controllers\Admin;

use App\V1\Categories\Model\Category;
use App\V1\Products\Model\ProductCategoryAttributes;
use App\V1\Products\Service\ProductCategoryService;
use App\V1\Products\Model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductsCategoryControllers extends Controller
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
        $category = $this->request->get('category', 2);
        $productsAttributes = ProductCategoryAttributes::where('category_id','=',$category)->get();
        $categories = Category::where('type','=','productos')->get();
        return view('adminlte::productsCategory/list',[
            'productsAttributes' => $productsAttributes,
            'categories' => $categories,
            'request' => $this->request
        ]);
    }

    public function prestore(){
        $categories = Category::where('type','=','productos')->get();
        return view('adminlte::productsCategory/create',['products' => new ProductCategoryAttributes(), 'categories' => $categories]);
    }

    public function store()
    {
        $product = (new ProductCategoryService())->add($this->request->all());

        return redirect()->route('adminProductsCategory')->with('message', 'Recurso guardado');
    }

    public function update(ProductCategoryAttributes $product)
    {
        $product = (new ProductCategoryService())->update($product, $this->request->all());

        return redirect()->route('adminProductsCategory')->with('message', 'Recurso guardado');
    }

    public function show(ProductCategoryAttributes $product)
    {
        $product = ProductCategoryAttributes::findOrFail($product);
        $categories = Category::where('type','=','productos')->get();
        return view('adminlte::productsCategory/edit',['product' => $product->first(), 'categories' => $categories]);
    }

    public function delete(ProductCategoryAttributes $product){
        $product = ProductCategoryAttributes::findOrFail($product);
        $product = $product->first();
        $product->forceDelete();

        return redirect()->route('adminProductsCategory')->with('message', 'Recurso eliminado');
    }
}