<?php

namespace App\Components\Schools;

use Bastinald\Ux\Traits\WithModel;
use App\Models\School;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Save extends Component
{
    use WithModel;

    public $school;

    public function mount(School $school = null)
    {
        $this->school = $school;

        $this->setModel($school->toArray());
    }

    public static function getSchool($tip='')
    {
        $titles = DB::table('schools')
        ->where('school_id',$tip)
        ->pluck('id');

        if (count($titles)>0) {            
            return $titles[0];
        }else {            
            return NULL;
        }
    }

    public function render()
    {
        return view('schools.save');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }
 
    public function save()
    {
        $this->validateModel();

        if (Auth::user()->id != '1'){
         $this->setModel('school_id',Auth::user()->school_id);
        }
        
        $this->school->fill($this->getModel())->save();

        session(['theme'=>$this->getModel('colour')]);
        // return redirect('#');
        return \App::make('redirect')->refresh()->with('flash_success', 'Thank you,!');
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
