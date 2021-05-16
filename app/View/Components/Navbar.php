<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Navbar extends Component
{
    public $enParam;
    public $ruParam;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($enParam, $ruParam)
    {
        $this->enParam = $enParam;
        $this->ruParam = $ruParam;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $enUrl = '';
        $ruUrl = '';
        $enCurrentUrl = route(Route::currentRouteName(), $this->enParam);
        $ruCurrentUrl = route(Route::currentRouteName(), $this->ruParam);
        $enCurrentRequest = app('request')->create($enCurrentUrl);
        $ruCurrentRequest = app('request')->create($ruCurrentUrl);
        $enSegments = $enCurrentRequest->segments();
        $ruSegments = $ruCurrentRequest->segments();
        for ($i = 0; $i < count($enSegments); $i++) {
            if (Lang::has('routes.' . $enSegments[$i], 'en')) {
                $enSegments[$i] = Lang::get('routes.' . $enSegments[$i], [], 'en');
            }
        }
        $enUrl = implode('/', $enSegments);
        for ($i = 0; $i < count($ruSegments); $i++) {
            if (Lang::has('routes.' . $ruSegments[$i], 'ru')) {
                $ruSegments[$i] = Lang::get('routes.' . $ruSegments[$i], [], 'ru');
            }
        }
        $ruUrl = implode('/', $ruSegments);
        dd($enUrl);
        return view('components.navbar');
    }
}
