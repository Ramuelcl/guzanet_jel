<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category as Category;
use Livewire\withPagination;

class Categories extends Component
{
    use withPagination;

    // public $categories;
    public $category_id;
    public $title;
    public $color;
    public $status;
//
    public $modal = false;
    public $active; // activa filtro Activo/Inactivo
    public $q;// busqueda
    public $searchTerm='';
    public $sortBy='id';
    public $sortAsc='ASC';
    public $confirmingDeletion=false;

    protected $queryString=[
        'active'=>['except'=>false],
        'q'=>['except'=>''],
        'sortBy'=>['except'=>'id'],
        'sortAsc'=>['except'=>true],
    ];
    public function mount()
    {
        // $this->categories = [];
    }
    public function render()
    {
        // if ($this->searchTerm) {
        // $search = '%' . $this->searchTerm. '%';
        // $students  = Student::where('firstname', 'LIKE', $search)
        //         ->orWhere('lastname', 'LIKE', $search)
        //         ->orWhere('email', 'LIKE', $search)
        //         ->orWhere('phone', 'LIKE', $search)
        //         ->orderBy('id', 'DESC')->paginate(5);
        // return view('livewire.students', ['students'=>$students]);

        //     $categories = Category::where('title', 'LIKE', $search)
        //  ->orWhere('color', 'LIKE', $search)
        //  ->order('id', 'DESC')
        // ->paginate(10);
        // } else {
        $categories = Category::orderBy($this->sortBy, $this->sortAsc?'ASC':'DESC')
        ->when($this->q, function ($query) {
            return $query->where(function ($query) {
                $query->where('title', 'like', '%'.$this->q.'%')
                ->orwhere('color', 'like', '%'.$this->q.'%')
                ->orwhere('status', 'like', '%'.$this->q.'%');
            });
        })
        ->when($this->active, function ($query) {
            return $query->active();
        });
        $query=$categories->toSql();
        $categories=$categories->paginate(8);
        // }
        // \dd($categories);
        return view('livewire.categories.categories', [
            'categories'=>$categories,
            'query'=>$query,
        ]);
    }

    public function updatingActive()
    {//reset a la página para eliminar posibles páginas fantasmas
        $this->resetPage();
    }

    public function updatingActiveQ()
    {//reset a la página para eliminar posibles páginas fantasmas
        $this->resetPage();
    }

    public function sortBy($field="title")
    {
        // dd($field);
        if ($field==$this->sortBy) {
            $this->sortAsc=!$this->sortAsc;
        }
        $this->sortBy=$field;
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'color' => 'required',
        ]);
//
        Category::updateOrCreate(['id' => $this->category_id], [
            'title' => $this->title,
            'color' => $this->color,
            'status' => $this->status?'Activo':'Inactivo'
        ]);
        $mensaje='Registro '.($this->category_id ? 'actualizado' : 'creado').' correctamente';
        session()->flash('message', __($mensaje));
        $this->openCloseModal();
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', __('Registro eliminado correctamente'));
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->title = $category->title;
        $this->color = $category->color;
        $this->status = $category->status=='Activo'?true:false;
        $this->openCloseModal();
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openCloseModal();
    }
    public function openCloseModal()
    {
        $this->modal = !$this->modal;
    }
    private function resetInputFields()
    {
        $this->category_id = '';
        $this->title = '';
        $this->color = '';
        $this->status = 'Activo';
    }
}
