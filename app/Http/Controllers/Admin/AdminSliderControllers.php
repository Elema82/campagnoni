<?php
namespace App\Http\Controllers\Admin;

use App\Api\V1\News\Service\NewService;
use App\Http\Controllers\Controller;
use App\V1\News\Model\News;
use App\V1\Slider\Model\Slider;
use Illuminate\Http\Request;

class AdminSliderControllers extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth');
    }

    public function index()
    {
        /**
         * @var $sliderHome Slider
         */
        $sliders = Slider::all();
        return view('adminlte::slider/list',[
            'sliders' => $sliders
        ]);
    }

    public function prestore(){

        return view('adminlte::slider/create',[
            'new' => new News(),
            'status' => [['id'=>'1', 'name' => 'Publicado'], ['id'=>'0', 'name' => 'Privado']]
        ]);
    }

    public function store()
    {
        $new = (new NewSlider())->add($this->request->all());
        return redirect()->route('adminSlider')->with('message', 'Recurso guardado');
    }

    public function update(News $news)
    {
        $product = (new NewService())->update($news, $this->request->all());

        return redirect()->route('adminSlider', ['category' => $product->category])->with('message', 'Recurso guardado');
    }

    public function show(News $news)
    {
        $news = News::findOrFail($news);
        $news = $news->first();

        return view('adminlte::slider/edit',[
            'new' => $news,
            'status' => [['id'=>'1', 'name' => 'Publicado'], ['id'=>'2', 'name' => 'Borrador']]
        ]);
    }

    public function delete(News $news){
        $news = News::findOrFail($news);
        $news = $news->first();
        $news->forceDelete();

        return redirect()->route('adminSlider')->with('message', 'Recurso eliminado');
    }
}