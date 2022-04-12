<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\withPagination;

class Categories extends Component
{
    use withPagination;

    // public $categories;
    public $category_id;
    public $title;
    public $color;
    public $isOpen = false;
//
    public $searchTerm='';
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
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        // }
        // \dd($categories);
        return view('livewire.categories.categories', [
            'categories'=>$categories,
        ]);
    }

    public function store()
    {
        $this->validate([
'title' => 'required',
'color' => 'required',
]);
        Category::updateOrCreate(['id' => $this->category_id], [
'title' => $this->title,
'color' => $this->color
]);
        session()->flash('message', $this->category_id ? 'Category Updated Successfully.' : 'Category Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->title = $category->title;
        $this->color = $category->color;
        $this->openModal();
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields()
    {
        $this->category_id = '';
        $this->title = '';
        $this->color = '';
    }
}
