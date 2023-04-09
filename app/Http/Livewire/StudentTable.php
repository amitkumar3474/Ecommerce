<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Session;
use Livewire\WithFileUploads;

class StudentTable extends Component
{
    use WithFileUploads;


    public $name;
    public $father_name;
    public $fess;
    public $phone_number;
    public $class;
    public $action;
    public $dataid;
    public $st_image;


    public function mount(){
        $this->action = 'list';
    }
    public function render()
    {
        $data = Student::all();
        return view('livewire.student', compact('data'));
    }
 
    public function create(){
        
        $this->action = 'creates';
    }

    protected $rules = [

        'name'         => 'required',
        'father_name'  => 'required',
        'fess'         => 'required',       
        'phone_number' => 'required',
        'class'        => 'required',
        'st_image'     => 'required',

    ];

    public function store($id = ''){
        $this->validate();
        $data = [
            'name' => $this->name,
            'father_name' => $this->father_name,
            'fess' => $this->fess,
            'phone_number' => $this->phone_number,
            'class'=> $this->class,
            'st_image' => $this->st_image->store('image')
        ];
        if($id){
            Student::Where('id', $id)->update($data);
            session()->flash('success', "Record Updated successfully....");
            
        }else{
            Student::create($data);
            session()->flash('success',  "Student created successfully...");
    

        }
           $this->reset();
           $this->action="list";
       }

       public function edit($id){
            $data = Student::Where('id', $id)->first();
            $this->name = $data->name;
            $this->father_name = $data->father_name;
            $this->fess = $data->fess;
            $this->phone_number = $data->phone_number;
            $this->class = $data->class;
            $this->dataid = $data->id;

            $this->action="creates";

       }
       public function delete($id){
        Student::Where('id', $id)->delete();
        session()->flash('success', "Record deleted successfully....");
        $this->action='list';
       }   
}
