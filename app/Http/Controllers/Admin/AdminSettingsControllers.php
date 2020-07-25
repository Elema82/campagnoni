<?php
namespace App\Http\Controllers\Admin;

use App\V1\Settings\Model\Setting;
use App\Http\Controllers\Controller;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class AdminSettingsControllers extends Controller
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
        $settings = Setting::all();
        return view('adminlte::settings/list',['settings' => $settings]);
    }

    public function prestore(){
        return view('adminlte::settings/create',['setting' => new Setting()]);
    }

    public function store(){
        $setting = new Setting();
        $setting->fill($this->request->all());
        if(!$errors = $setting->isValid()) {
            return view('adminlte::settings/create', ['setting' => $setting, 'errors' => $errors]);
        }
        $setting->save();

        return redirect()->route('adminSettings')->with('message', 'Recurso guardado');
    }

    public function update(Setting $setting){
        $setting = Setting::findOrFail($setting);
        $setting = $setting->first();
        $setting->fill($this->request->all());
        if(!$errors = $setting->isValid()) {
            return view('adminlte::settings/edit', ['setting' => $setting, 'errors' => $errors]);
        }
        $setting->save();

        return redirect()->route('adminSettings')->with('message', 'Recurso guardado');
    }

    public function show(Setting $setting){
        $setting = Setting::findOrFail($setting);
        return view('adminlte::settings/edit',['setting' => $setting->first()]);
    }
}