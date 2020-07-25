<?php
namespace App\Http\Controllers\Admin;

use App\Api\V1\News\Service\NewService;
use App\Http\Controllers\Controller;
use App\V1\News\Model\News;
use Illuminate\Http\Request;

class AdminNewsControllers extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('auth');
    }

    public function index()
    {
        $news = News::whereRaw('1 = 1')->get();
        return view('adminlte::news/list',[
            'news' => $news,
            'status' => [['id'=>'1', 'name' => 'Publicado'], ['id'=>'2', 'name' => 'Borrador']]
        ]);
    }

    public function prestore(){

        return view('adminlte::news/create',[
            'new' => new News(),
            'status' => [['id'=>'1', 'name' => 'Publicado'], ['id'=>'2', 'name' => 'Borrador']]
        ]);
    }

    public function store()
    {
        $new = (new NewService())->add($this->request->all());
        return redirect()->route('adminNews')->with('message', 'Recurso guardado');
    }

    public function update(News $news)
    {
        $product = (new NewService())->update($news, $this->request->all());

        return redirect()->route('adminNews', ['category' => $product->category])->with('message', 'Recurso guardado');
    }

    public function show(News $news)
    {
        $news = News::findOrFail($news);
        $news = $news->first();

        return view('adminlte::news/edit',[
            'new' => $news,
            'status' => [['id'=>'1', 'name' => 'Publicado'], ['id'=>'2', 'name' => 'Borrador']]
        ]);
    }

    public function delete(News $news){
        $news = News::findOrFail($news);
        $news = $news->first();
        $news->forceDelete();

        return redirect()->route('adminNews')->with('message', 'Recurso eliminado');
    }
}