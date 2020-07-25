<?php
namespace App\Http\Controllers;

use App\V1\Frontend\Service\FrontendService;
use App\Http\Requests;
use App\V1\Categories\Model\Category;
use App\V1\News\Model\News;
use App\V1\Settings\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\V1\Products\Model\Product;

class FrontendController extends Controller
{
    public $headerValues = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $prodCategory = Category::getCategoryByName('Motores');
        $this->headerValues['engineProducts'] = Product::where('category','=', $prodCategory)->get();
        $prodCategory = Category::getCategoryByName('Calefaccion');
        $this->headerValues['heatingProducts'] = Product::where('category','=', $prodCategory)->get();
        $prodCategory = Category::getCategoryByName('Ventilacion');
        $this->headerValues['ventilationProducts'] = Product::where('category','=', $prodCategory)->get();
        $prodCategory = Category::getCategoryByName('Jardin bordeadoras');
        $this->headerValues['gardenBProducts'] = Product::where('category','=', $prodCategory)->get();
        $prodCategory = Category::getCategoryByName('Jardin cortadoras');
        $this->headerValues['gardenCProducts'] = Product::where('category','=', $prodCategory)->get();
        $metaD = (Setting::where('key', '=', 'meta-description')->get())->first();
        $this->headerValues['settings']['meta-description'] = $metaD->value;
        $metaT = (Setting::where('key', '=', 'meta-title')->get())->first();
        $this->headerValues['settings']['meta-title'] = $metaT->value;

    }

    /**
     * @param $category
     * @param Product $product
     * @param $name
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showProduct($category, Product $product, $name)
    {
        $category = $product->category()->getResults()->name;
        if(preg_match('/Jardin/', $category))
            $category = 'Jardin';
        return view('single-product', [
            'product' => $product,
            'category' => $category,
            'name' => explode(' ', $product->name),
            'headerValues' => $this->headerValues
            ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showProductsEngines()
    {
        $prodCategory = Category::getCategoryByName('Motores');
        $products = Product::where('category','=', $prodCategory)->get();
        return view('products-engines', [
            'products' => $products,
            'headerValues' => $this->headerValues
        ]);
    }


    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showProductsVentilation()
    {
        $prodCategory = Category::getCategoryByName('Ventilacion');
        $products = Product::where('category','=', $prodCategory)->get();
        return view('products-ventilation', [
            'products' => $products,
            'headerValues' => $this->headerValues
        ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showProductsHeating()
    {
        $prodCategory = Category::getCategoryByName('Calefaccion');
        $products = Product::where('category','=', $prodCategory)->get();
        return view('products-heating', [
            'products' => $products,
            'headerValues' => $this->headerValues
        ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showProductsIrrigation()
    {
        $prodCategory = Category::getCategoryByName('Riego');
        $products = Product::where('category','=', $prodCategory)->get();
        return view('products-irrigation', [
            'products' => $products,
            'headerValues' => $this->headerValues
        ]);
    }


    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showProductsGarden()
    {
        $prodCategory = Category::getCategoryByName('Jardin bordeadoras');
        $products1 = Product::where('category','=', $prodCategory)->get();
        $prodCategory = Category::getCategoryByName('Jardin cortadoras');
        $products2 = Product::where('category','=', $prodCategory)->get();
        return view('products-garden', [
            'products1' => $products1,
            'products2' => $products2,
            'headerValues' => $this->headerValues
        ]);
    }

    public function showNews()
    {
        $news = News::whereRaw('1 = 1')->where('status','=',1)->get();
        return view('news', [
            'news' => $news,
            'status' => [['id'=>'1', 'name' => 'Publicado'], ['id'=>'2', 'name' => 'Borrador']],
            'headerValues' => $this->headerValues
        ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function singleNews(News $news)
    {
        foreach ($news->attachments()->getResults() as $images) {
            if ($images->id == $news->img_principal) {
                $this->headerValues['meta-image'] = $images->url_path;
            }
        }

        return view('single-news', [
            'news' => $news,
            'headerValues' => $this->headerValues
        ]);
    }

    public function showContact()
    {
        return view('contact',[
            'message' => '',
            'headerValues' => $this->headerValues
        ]);
    }
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function contact(Request $request)
    {
        $message = 'Se ha enviado su consulta. Nos contactaremos a la brevedad. Gracias.';
        $errors = [];

        $email = (new FrontendService())->sendContactEmail($request->all());

        return view('contact', [
            'errors' => $errors,
            'message' => $message,
            'headerValues' => $this->headerValues
            ]);
    }

    public function aboutUs()
    {
        return view('about-us', [
            'headerValues' => $this->headerValues
        ]);
    }

    public function home()
    {
        return view('index', [
            'headerValues' => $this->headerValues
            ]);
    }
}