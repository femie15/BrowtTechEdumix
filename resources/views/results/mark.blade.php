@php
if ($getStudent) {
   $classn= $getStudent[0]->cname;
   $aa= $getStudent[0]->uname.' Marksheet ('.$classn.')';
   $sectn= $getStudent[0]->sname;
   $classn= $getStudent[0]->cname;
   $roll= $getStudent[0]->roll;
   $nick= $getStudent[0]->nick_name;
}else{ 
    $aa='Marksheet'; 
   $sectn= '';
   $classn= '';
   $roll='';
   $nick='';
}
if ($filtr=='') {
    $fil='Select Term and Session';
}else{
    $fil=$filtr;
}
$promotion_status='';
$ft=$sc=$tt=$sn=$av=0;
@endphp
<x-ux::layouts.page :title="__($aa)">
    <center>
        <x-ux::action-dropdown key="filter" label="{{ $fil }}" icon="calendar"/>
    </center>
{{-- !$filtr ? __('Select Term and Session') : $filtr--}}
   
@if ($results && (count($results)>0))  

                    @php           
                    $path_to_file ='assets/images/users/'.$results[0]->student_id.'.jpg';     
                    @endphp 
                        @if (File::exists(public_path($path_to_file)))
                            <x-ux::image asset="{{ $path_to_file }}" width="90px" height="90px" style="float:right; margin-top:15px; margin-right:10px;"/>
                        @else
                            <x-ux::action icon="user fa-6x" :title="__('Add Image')" click="$emit('showModal', 'users.save', {{ $results[0]->student_id }})" width="90px" height="90px" style="float:right; margin-top:15px; margin-right:10px;"/>
                        @endif
<br>

<table>
    <tr>
        <td>Admission No:</td>
        <td>{{ $roll }}</td>
        <td> &emsp; Section:</td>
        <td>{{ $sectn }} ({{ $nick }})</td>
    </tr>
    <tr>
        <td>Term ends:</td>
        <td>{{ $getTerm[0]['start'] }}</td>
        <td > &emsp; Next term begins: </td>
        <td>{{ $getTerm[0]['end'] }}</td>
    </tr>
</table>


<center>	<br>
<table width="95%" class="table table-responsive table-stripped table-bordered">
        <tr><h4><b>COGNITIVE SKILL (ACADEMIC)</b></h4></tr>
    <tr>																		
        <tr>
        <th rowspan="3"><div width="30px"><center>SUBJECTS</center></div></th>
        <th colspan="4"><div><center> C.A.</center></div></th>
        <th rowspan="2"><div class="rotate"> EXAM <br>Marks</div></th>
        <th rowspan="2"><div class="rotate"> &emsp;Total<br> &emsp;Score</div></th>
        <th rowspan="3"><div class="rotate"><center>CLASS <br>AVERAGE</center></div></th>
        <th rowspan="3"><div class="rotate"> GRADE</div></th>
        <th rowspan="3"><div class="rotate"> REMARKS</div></th>			
        <th colspan="4"><div><center>YEAR SUMMARY</center></div></th>	             
        </tr>

        <tr>
            <td color="black"><center>ASSIGNMENT </center></td>
            <td class="rotate" height="60"> NOTE</td>
            <td class="rotate"> TEST 1</td>
            <td class="rotate"> TEST 2</td>
            <td class="rotate" rowspan="2"> 1st Term </td>
            <td class="rotate" rowspan="2"> 2nd Term </td>
            <td class="rotate" rowspan="2"> 3rd Term </td> 
            <td class="rotate" rowspan="2"> Ave Score</td>           
        </tr>

            <td><center> 10 </center></td>
            <td><center>10 </center></td>
            <td><center>10 </center></td>
            <td><center> 20 </center></td>
            <td><center> 50 </center></td>
            <td><center> 100 </center></td>
    </tr>

         @foreach($results as $result)  

               
@php
$sum=$result->ca1+$result->ca2+$result->text1+$result->text2+$result->exam;
$firstterm='\App\Components\Results\mark'::termly($result->student_id,'1st',$result->session,$result->subject_id);
$secondterm='\App\Components\Results\mark'::termly($result->student_id,'2nd',$result->session,$result->subject_id);
$thirdterm='\App\Components\Results\mark'::termly($result->student_id,'3rd',$result->session,$result->subject_id);
$oneq= ($firstterm>=1 && $secondterm<1 && $thirdterm<1) ||
       ($firstterm<1 && $secondterm>=1 && $thirdterm<1) ||
       ($firstterm<1 && $secondterm<1 && $thirdterm>=1);
$towq= ($firstterm>=1 && $secondterm>=1 && $thirdterm<1) ||
       ($firstterm<1 && $secondterm>=1 && $thirdterm>=1) ||
       ($firstterm>=1 && $secondterm<1 && $thirdterm>=1);
$thrq= ($firstterm>=1 && $secondterm>=1 && $thirdterm>=1);

if ($oneq) {
   $dv=1;
}elseif ($towq) {    
   $dv=2;
}elseif ($thrq) {    
   $dv=3;
}

$avgscore=number_format((($firstterm+$secondterm+$thirdterm)/$dv),2);
$ft+=$firstterm;
$sc+=$secondterm;
$tt+=$thirdterm;
$av+=$avgscore;
$sn++;
@endphp

         <tr>
            <td>{{ $result->subject[0]->name }}</td>
            <td><center> {{ $result->ca1 }}</center> </td>
            <td><center> {{ $result->ca2 }} </center></td>                               
            <td><center> {{ $result->text1 }} </center></td>
            <td><center> {{ $result->text2 }} </center></td>
            <td><center> {{ $result->exam }} </center></td>
            <td><center> {{ $sum }} </center></td>
            <td><center> {{ '\App\Components\Results\mark'::clavg($result->term,$result->session,$result->subject_id,$result->class_id,$result->section_id) }} </center></td>
            <td><center>{{ '\App\Components\Results\mark'::grade($sum)['grade'] }} </center></td>
            <td><center>{{ '\App\Components\Results\mark'::grade($sum)['remark'] }}</center></td>
            <td><center>
                {{ $firstterm }}
                </center></td>
            <td><center>
                {{ $secondterm }}
            </center></td>
            <td><center>                
                {{ $thirdterm}}
            </center></td>

            <td><center> {{ $avgscore }}</center></td>
        </tr>
        @endforeach

    </table>
@php
$promo=$av/$sn;
$bod="hidden";
$thir=$tt/$sn;
                //Promotion status
                    if ($thir>=1)
                    {
                        if ($promo>=50)
                        {
                            $promotion_status="PROMOTED TO NEXT CLASS";
                            $bod="";
                        }
                        else
                        {
                            $promotion_status="REPEAT CLASS";
                            $bod="";
                        }
                    }
                //Teacher and Principal's Remark
                if($promo>=0 && $promo<44.5){
                    $gtr="POOR RESULT";
                    $ar="YOU NEED TO WORK HARDER";
                }elseif($promo>=44.5 && $promo<49.5){
                    $gtr="A WEAK PERFOMANCE";
                    $ar="PUT MORE EFFORT TO IMPROVE";
                }elseif($promo>=49.5 && $promo<59.5){
                    $gtr="AN AVERAGE PERFOMANCE";
                    $ar="YOU CAN DO BETTER";
                }elseif($promo>=59.5 && $promo<69.5){
                    $gtr="A GOOD RESULT";
                    $ar="YOU CAN DO BETTER";
                }elseif($promo>=69.5 && $promo<=84.5){
                    $gtr="VERY GOOD PERFORMANCE";
                    $ar="BRILLIANT, KEEP IT UP";
                }elseif($promo>=84.5 && $promo<=100){
                    $gtr="EXCELLENT PERFORMANCE";
                    $ar="BRILLIANT, KEEP IT UP";
                }else{
                    $gtr="-----";
                    $ar="-----";
                    }
@endphp
    <table class="table table-stripped">
        <tr>
            <td rowspan="2"><center>&emsp;1st term Average:&emsp;{{ number_format(($ft/$sn),2)}}&emsp;</center></td>
            <td rowspan="2"><center>&emsp;2nd term Average:&emsp;{{ number_format(($sc/$sn),2) }}&emsp;</center></td>
            <td rowspan="2"><center>&emsp;3rd term Average:&emsp;{{ number_format(($tt/$sn),2) }}&emsp; </center></td>
            <td><center>&emsp;Total Average:&emsp;{{ number_format(($av/$sn),2) }}&emsp;</center></td>
        </tr>
        <tr {{ $bod }}>
            <td>
                <center><b>{{ $promotion_status }} </b></center>
            </td>
        </tr>
    </table>

        <h6>GRADE TEACHER'S REMARKS:&emsp;{{ $gtr }}</h6>
        <h6>PRINCIPAL'S REMARKS:&emsp;{{ $ar }}</h6>


    {{-- dd($getTerm[0]['end']-$getTerm[0]['start']); --}}

        <table style='margin-left:0px;' > 
            <tr>
                {{-- <td >&emsp;Times school opened:</td>
                <td>&emsp;114&emsp;</td>
                <td>&emsp;Times Present:</td>
                <td>&emsp;68&emsp;</td>
                <td>&emsp; Times Absent:</td>
                <td>&emsp;46&emsp;</td> --}}
                <td >Signature/Date ..........................</td>
            </tr>
        </table>

</center>
@else
{{ __('No result for the selected term') }}
@endif

    {{-- <x-ux::pagination :links="$results"/> --}}
</x-ux::layouts.page>
