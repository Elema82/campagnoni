<?php
namespace App\Http\Controllers\Admin;

use App\V1\Categories\Model\Category;
use App\V1\Products\Model\ProductAttributes;
use App\V1\Products\Model\ProductCategoryAttributes;
use App\V1\Products\Service\ProductService;
use App\V1\Products\Model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductsControllers extends Controller
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
        $products = Product::where('category','=',$category)->get();
        $categories = Category::where('type','=','productos')->get();
        return view('adminlte::products/list',[
            'products' => $products,
            'categories' => $categories,
            'request' => $this->request
        ]);
    }

    public function prestore(){
        $categories = Category::where('type','=','productos')->get();
        $attributes = [];
        if($category = $this->request->get('category',null))
            $attributes = ProductCategoryAttributes::where("category_id",'=', $category)->get();
        return view('adminlte::products/create',[
            'products' => new Product(),
            'categories' => $categories,
            'attributes' => $attributes
        ]);
    }

    public function store()
    {
        $product = (new ProductService())->add($this->request->all());
        return redirect()->route('adminProducts')->with('message', 'Recurso guardado');
    }

    public function update(Product $product)
    {
        $product = (new ProductService())->update($product, $this->request->all());

        return redirect()->route('adminProducts', ['category' => $product->category])->with('message', 'Recurso guardado');
    }

    public function show(Product $product)
    {
        $product = Product::findOrFail($product);
        $product = $product->first();
        $categories = Category::where('type','=','productos')->get();
        $attributes = ProductCategoryAttributes::where("category_id",'=', $product->category)->get();
        $attributesValues = ProductAttributes::where('product_id','=', $product->id)->get();
        return view('adminlte::products/edit',[
            'product' => $product,
            'categories' => $categories,
            'attributes' => $attributes,
            'attributesValues' => $attributesValues
            ]);
    }

    public function delete(Product $product){
        $product = Product::findOrFail($product);
        $product = $product->first();
        $product->forceDelete();

        return redirect()->route('adminProducts')->with('message', 'Recurso eliminado');
    }
}