<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\ClientRequest;
use Livewire\Component;

class Form extends Component
{
    public $requestedProducts;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $company;
    public $message;
    public $iteration = 0;

    protected $rules = [
        'email' => 'required|email',
        'fname' => 'required',
        'lname' => 'required',
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'message' => 'required'
    ];

    public function render()
    {
        return view('livewire.form',['categories'=> Category::all()]);
    }

    public function submitRequest()
    {
        $this->validate();

        $request = new ClientRequest();
        $request->email = $this->email;
        $request->first_name = $this->fname;
        $request->last_name = $this->lname;
        $request->company = $this->company;
        $request->phone = $this->phone;
        $request->products = json_encode($this->requestedProducts);
        $request->message = $this->message;
        $request->save();
        $this->reset(['email', 'fname', 'lname', 'company', 'phone', 'requestedProducts', 'message']);

        session()->flash('message', __('Your request have been sent successfully'));
    }
}
