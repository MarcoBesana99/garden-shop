<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Lang;
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
        //create urls for the lang switcher
        $urls = [];
        foreach (config('translatable.locales') as $index => $locale) {
            ${$locale . 'CurrentUrl'} = route(Route::currentRouteName(), $this->{$locale . 'Param'});
            ${$locale . 'CurrentRequest'} = app('request')->create(${$locale . 'CurrentUrl'});
            ${$locale . 'Segments'} = ${$locale . 'CurrentRequest'}->segments();
            for ($i = 0; $i < count(${$locale . 'Segments'}); $i++) {
                if (Lang::has(${$locale . 'Segments'}[$i], $locale)) {
                    ${$locale . 'Segments'}[$i] = Lang::get(${$locale . 'Segments'}[$i], [], $locale);
                }
            }
            $urls[$index]['locale'] = $locale;
            $urls[$index]['url'] = '/' . implode('/', ${$locale . 'Segments'});;
        }
        
        return view('components.navbar', compact('urls'));
    }
}
