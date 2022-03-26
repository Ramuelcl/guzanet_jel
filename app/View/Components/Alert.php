<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;

class Alert extends Component
{
    public $color="red";
    public $alert="info";
    public $title="Alerta";
    public $message="Ups! Hubo un problema";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // error
        if ($this->message = Session::get('error')) { //| $errors->any()
            $this->alert="error";
            $this->color="red";
        // warning
        } elseif ($this->message = Session::get('warning')) {
            $this->alert="warning";
            $this->color="yelow";
        // success
        } elseif ($this->message = Session::get('success')) {
            $this->alert="success";
            $this->color="green";
        // info
        } elseif ($this->message = Session::get('info')) {
            $this->alert="info";
            $this->color="blue";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
