<?php

namespace App\Components;

use Illuminate\Support\Facades\Route;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $dta,$engl,$dtl;
    
    public function route()
    {
        return Route::get('dashboard', static::class)
            ->name('dashboard')
            ->middleware('auth');
    }

    public function student()
    {              
        $query =  DB::table('users')
        ->select(DB::raw('name'))
        ->Where('role', 'student')
        ->Where('school_id', Auth::user()->school_id)
        ->Where('delet','!=', '1')
        ->get();
        // dd(count($query));

        return count($query);
    }

    public function parent()
    {              
        $query =  DB::table('users')
        ->select(DB::raw('name'))
        ->Where('role', 'parent')
        ->Where('school_id', Auth::user()->school_id)
        ->Where('delet','!=', '1')
        ->get();

        return count($query);
    }

    public function teacher()
    {              
        $query =  DB::table('users')
        ->select(DB::raw('name'))
        ->Where('role', 'teacher')
        ->Where('school_id', Auth::user()->school_id)
        ->Where('delet','!=', '1')
        ->get();
        // dd(count($query));

        return count($query);
    }
    
    public function get_phrase($phrase='')
    {   
       $dt = DB::table('languages')
       ->select(DB::raw('english'))
       ->where('phrase','=',$phrase)
       ->get();

       foreach ($dt as $gp){
        $engl=$gp->english;
        if ($engl != ''){                
                        $engl=ucwords($engl);
                        }else{
                            $engl= ucwords(str_replace('_',' ',$phrase));
                        }
            return $engl;
       }
    }

    public function classes()
    {   
       $dt = DB::table('classeds')        
       ->where('name','!=','graduate')
       ->where('deleted_at','=',NULL)
       ->get();

       return $dt;       
    }
    
    public function notices()
    {   
       $dt = DB::table('noticeboards')
       ->get();

       return $dt;       
    }

    public function settings()
    {   
        $dtl = DB::table('settings')        
       ->where('settings_id','16')
       ->get('description');
    //    ->where('settings_id','1')
    //    ->where('settings_id','11')
    //    ->get();
    //   $sn=1;
    // dd($dtl[0]->description);
    //     foreach ($dtl as $clr) 
    //     {
    //         // $sn++;
    //         $dtlp=$clr->description;
    //         $dty=$clr->type;
    //         // return $dt;
    //         // session()->put($dty, $dtlp);
    //         session(['num'=>$sn]);
    //         session(['theme'=>$dtlp]);
    //     }
        session(['theme'=>$dtl[0]->description]);
        
        return  session('theme');      
    }

    public function render()
    {
        return view('dashboard', [
            'get_phrase'=> $this->get_phrase(),
            'notices'=> $this->notices(),
            // 'settings'=> $this->settings(),
            'classes'=> $this->classes(),
            'student'=> $this->student(),
            'parent'=> $this->parent(),
            'teacher'=> $this->teacher(),
        ]);
    }
}
