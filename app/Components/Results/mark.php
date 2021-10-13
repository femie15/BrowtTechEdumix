<?php

namespace App\Components\Results;

use Bastinald\Ux\Traits\WithModel;
use App\Models\Result;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Section;


class Mark extends Component
{
    use WithModel, WithPagination;
    public $clid;
    public $user,$query;

    protected $listeners = ['$refresh'];

    public function route()
    {
        return Route::get('mark/{clid}', static::class)
            ->where('clid', '[0-9]+')
            ->name('mark')
            ->middleware('auth');
    }

    public function mount($clid)
    { 
        // $this->render($clid);
        $this->setModel([
            'sort' => 'Name',
            'sorts' => ['Name', 'Newest', 'Oldest'],
            'std' => $clid,
            // 'filter' => $clid,
            'filters' => $this->getTerm()[0],
        ]);
    }

    
    public function getClass()
    {
        $titles = DB::table('classeds')
        ->where('name','!=','graduate')
        ->pluck('id', 'name');  

        return $titles;
    }

        
    public function getTerm()
    {
        $ts=[];
        $tms=$ar=[];
        $titles = DB::table('terms')
        // ->where('school_id',Auth::user()->school_id)
        ->get();  
        // ->pluck
        foreach ($titles as $key => $value) {
            $conc=$value->session.' ('.$value->name.' Term)';
            array_push($ts,$conc);

            if ($conc==$this->getModel('filter')) {
            array_push($tms,['start'=>$value->start_date,'end'=>$value->end_date]); 
             }
// ,'end'=>$value->end_date
        }
        array_push($ar, $ts);
        array_push($ar, $tms);

        
        return $ar;
    }

    public function getStudent()
    {
        $sect = DB::table('users')
                ->select(DB::raw('users.name as uname,users.roll,users.section_id,sections.name as sname,sections.nick_name,classeds.name as cname'))
                ->join('sections', 'users.section_id', '=', 'sections.id')
                ->join('classeds', 'users.class_id', '=', 'classeds.id')
                ->where('users.id', $this->getModel('std'))
                ->get();
        
        return $sect;        
    }

        
    public function getSubject()
    {
        if($this->getModel('filter')>0){
            $titles = DB::table('subjects')
            // ->where('school_id',Auth::user()->school_id)
            // ->where('class_id',$this->getModel('filter'))
            ->orderby('name')
            ->pluck('id', 'name');  
            return $titles;
         }
    }

    public function hd(){
        if (isset($_GET['view']) && is_numeric($_GET['view']) && $_GET['view']>0){            
            $hid=$_GET['view'];
        }else{            
            $hid='hidden';
        }
        return $hid;
    }

    public function render()
    {          
        if($this->query()==''){
            $rr= $this->query();
            }else{
                $rr= $this->query()->paginate();                
            }

        return view('results.mark', [
            'results' =>$rr,
            'getStudent'=> $this->getStudent(),
            'filtr'=>$this->getModel('filter'),
            'getTerm'=>$this->getTerm()[1],
        ]);
    }

    public function grade($sum=''){
        if($sum>=0 && $sum<=49){
            $grade="F9";
            $remark="Fail";
        }elseif($sum>=50 && $sum<=54){
            $grade="E8";
            $remark="Pass";
        }elseif($sum>=55 && $sum<=59){
            $grade="D7";
            $remark="Needs to improve";
        }elseif($sum>=60 && $sum<=64){
            $grade="C6";
            $remark="Satisfactory";
        }elseif($sum>=65 && $sum<=69){
            $grade="C5";
            $remark="Satisfactory";
        }elseif($sum>=70 && $sum<=74){
            $grade="C4";
            $remark="Satisfactory";
        }elseif($sum>=75 && $sum<=79){
            $grade="B3";
            $remark="Good";
        }elseif($sum>=80 && $sum<=84){
            $grade="B2";
            $remark="Good";
        }elseif($sum>=85 && $sum<=100){
            $grade="A1";
            $remark="Excellent";
        }else{
            $grade="-";
            $remark="-";
           }

           return ['grade'=>$grade,'remark'=>$remark];
    }

    public function termly($sid='',$term='',$ses='',$sub=''){
        $titles = DB::table('results')
        ->Where('student_id', $sid)
        ->Where('session', $ses)   
        ->Where('term', $term)
        ->Where('subject_id', $sub)
        ->get(); 
            if (count($titles)>0) {
                $sum=$titles[0]->ca1+$titles[0]->ca2+$titles[0]->text1+$titles[0]->text2+$titles[0]->exam;
        }else{
            $sum=0;
        }

        return $sum;
    }

    public function clavg($term='',$ses='',$sub='',$clid='',$section=''){
        $foo = new Result();        
        $qu = $foo->seen($term,$ses,$sub,$clid,$section);
        // dd($qu);

        return $qu;
    }
    
    public function query()
    {   
        
            if (is_numeric($this->getModel('std')) && $this->getModel('std')>0) 
            { 
                if ($this->getModel('filter') && $this->getModel('filter')!='') 
                {
                    // $this->setModel('filter',$this->getModel('filter'));
                    $query = Result::query()->with('subject');
                    $query->Where('school_id', Auth::user()->school_id);
                    $query->Where('student_id', $this->getModel('std'));
                            //process term and session
                            $exp=explode(' (',$this->getModel('filter'));
                            $expt=explode(' T',$exp[1]);
                    $query->Where('session', $exp[0]);   
                    $query->Where('term', $expt[0]);   

                    return $query;
                }
                
            }else{
                $query= [];
                return null;
            }
    }

    public function delete(Result $result)
    {
        $result->delete();
    }
}