<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Api\V1\Frontend\FrontendService;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\V1\Products\Model\Product;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('adminlte::home');
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function login()
    {
        if(Auth::user()){
            return view('adminlte::home');
        }
        else{
            return view('adminlte::auth.login');
        }
    }

    public function showProduct($category, Product $product, $name)
    {
        //dd($product->attachments()->getResults());
        $category = $product->category()->getResults()->name;
        if(preg_match('/Jardin/', $category))
            $category = 'Jardin';
        return view('single-product', [
            'product' => $product,
            'category' => $category,
            'name' => explode(' ', $product->name)
            ]);
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function contact(Request $request)
    {
        $message = '';
        $errors = [];

        $email = (new FrontendService())->sendContactEmail($request->all());

        return view('contact', [
            'errors' => $errors,
            'message' => $message]);
    }
}