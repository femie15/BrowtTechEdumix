<x-ux::layouts.page :title="__('Dashboard')">
	<style>
		.title{
			background: #fff;
			/* opacity: 0.5; */
		}
		.icon{
			font-size: 25px;
			font-weight: 700;
			color:{{{ session()->get('theme') }}};
		}
		.tile-title{
			position: relative;
			display:block;
			background:rgb(255, 255, 255);
			margin-bottom: 10px;
			border-radius: 20px;
			background-clip: padding-box;
			transition: all 300ms ease-in-out;
		}
	</style>
	
	<div class="row">
            <div class="col-md-4"  >
				<a href="{{ url('/student') }}"> 
                <div class="tile-stats tile-{{ session()->get('theme') }}">
                    <div class="icon"><i class="fa fa-group"></i></div>
                    <div class="num" data-start="0" data-end="{{ $student }}" 
                    		data-postfix="" data-duration="1500" data-delay="0">0</div>
                    
                    <h3>
						{{ '\App\Components\Dashboard'::get_phrase('student'); }}s
					</h3>
                  <!-- <p>Total Number of students</p>-->
                 </div></a>
                
            </div>
            <div class="col-md-4" >
				<a href="{{ url('/teacher') }}"> 
                <div class="tile-stats tile-{{ session()->get('theme') }}">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="{{ $teacher }}" 
                    		data-postfix="" data-duration="800" data-delay="0">0</div>
                    
                    <h3>{{ '\App\Components\Dashboard'::get_phrase('teacher'); }}s</h3>
                 <!--  <p>Total Number of teachers</p>-->
                </div></a>
                
            </div>
            <div class="col-md-4" style=" background-color:#fff;">
            <a href="{{ url('/parent') }}"> 
                <div class="tile-stats tile-{{ session()->get('theme') }}">
                    <div class="icon"><i class="entypo-user"></i></div>
                    <div class="num" data-start="0" data-end="{{ $parent }}" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3>{{ '\App\Components\Dashboard'::get_phrase('parent'); }}s</h3>
                <!--   <p>Total Number of parents</p>-->
                </div></a>
                
            </div>
          <!--  <div class="col-md-12">            
                <div class="tile-stats tile-blue">
                    <div class="icon"><i class="entypo-chart-bar"></i></div>
                    {{-- <?php 
							// $check	=	array(	'date' => date('Y-m-d') , 'status' => '1' );
							// $query = $this->db->get_where('attendance' , $check);
							// $present_today		=	$query->num_rows();
						?> --}}
                    <div class="num" data-start="0" data-end="<?php //echo $present_today;?>" 
                    		data-postfix="" data-duration="500" data-delay="0">0</div>
                    
                    <h3><?php echo ('attendance');?></h3>
                   <p>Total Number of student present in school today</p>
                </div>-->
		
            </div>		
				
				


{{-- <div class="row"> 
<div class="col-md-2"  style=" background-color:rgb(255, 253, 253);">
	 <br>
	 <br>
	 <br>
		<a href=""> <div class="tile-stats tile-white" style="border-radius:100px; color:rgb(55,7,28);">
            <i class="fa fa-file fa-4x" ></i>
			<h5><b>Input Results</b></h5>
        </div></a><br/>
		<br/>
		
		
		<a href=""> 
			<div class="tile-stats tile-white" style="color:rgb(55,7,28);">
           
			<h5><b>JSS 1</b></h5>
        </div></a>
			
	</div>
	<div class="col-md-2" style=" background-color:rgb(255, 253, 253);" ><br/><br/><br/>
	 
	<a href="">	 
		<div class="tile-stats tile-white" style="border-radius:100px; color:rgb(0,255,56);">
            <i class="fa fa-ticket fa-4x"></i>
			<h5><b>Affective Traits</b></h5>
        </div></a><br/><br/>

		<!--<a href="pm/bulk.php">	 <div class="tile-stats tile-white" style="border-radius:100px; color:rgb(0,255,56);">
            <i class="fa fa-group fa-4x"></i>
			<h5><b><i class="fa fa-plus "></i>Bulk Student</b></h5>
        </div></a><br/>-->

		<div class="row">
            <div class="col-md-6"  >
		<a href=""> 
			<div class="tile-stats tile-white" style="color:rgb(55,7,28);">
           
			<h6><b>JSS2</b></h6>
        </div></a>
			</div>

			<div class="col-md-6"  >
		<a href=""> <div class="tile-stats tile-white" style="color:rgb(55,7,28);">
           
			<h6><b>JSS3</b></h6>
        </div></a>
			</div>

		</div>
	</div>
	<div class="col-md-2" style=" background-color:rgb(255, 253, 253);" ><br/><br/><br/>
	 
		<a href=""> <div class="tile-stats tile-white" style="border-radius:100px; color:rgb(55,7,28);">
            <i class="fa fa-user fa-4x" ></i>
			<h5><b>New Student</b></h5>
        </div></a><br/><br/>
		
		<div class="row">
            <div class="col-md-6"  >
		<a href=""> <div class="tile-stats tile-white" style="color:rgb(55,7,28);">
           
			<h6><b>SSS1</b></h6>
        </div></a>
			</div>

			<div class="col-md-6"  >
		<a href=""> <div class="tile-stats tile-white" style="color:rgb(55,7,28);">
           
			<h6><b>SSS2</b></h6>
        </div></a>
			</div>

		</div>
	</div>
	<div class="col-md-2" style=" background-color:rgb(255, 253, 253);"><br/><br/><br/>
 
	<a href=""> <div class="tile-stats tile-white" style="border-radius:100px; color:rgb(9,17,200);">
            <i class="fa fa-th-large fa-4x" ></i>
			<h5><b>Subject Tutors</b></h5>
        </div></a><br/><br/>
		<a href=""> <div class="tile-stats tile-white" style="color:rgb(55,7,28);">
           
			<h5><b>SSS 3</b></h5>
        </div></a>
	</div>
</center> --}}
<br><br><br>

<div class="row">
	<div class="col-md-8">
		
		@php
			$ct='\App\Components\Attendances\index'::countAtt();
			$per=($ct/$student)*100;
		@endphp
		<center>
			Attendance Today: {{ date('Y-m-d') }}
			<x-ux::progress percent="{{ $per }}" color="primary" label="{{ '\App\Components\Attendances\index'::countAtt() }} Students" animated striped/>

			{{-- <div class="progress" style="height: 30px;">
				<div class="progress-bar" role="progressbar" style="width: {{ $per }}%;" aria-valuenow="{{ $per }}" aria-valuemin="0" aria-valuemax="100" >{{ '\App\Components\Attendances\index'::countAtt() }} Students</div>
			  </div> --}}
		</center>
		<br>
		<br>
		<div class="row">
		<div class="col-md-3 col-sm-6">			
			{{-- click="$emit('showModal', 'users.save')" --}}
			<div class="tile-title tile-primary">
				<div class="icon">
					<x-ux::link icon="user fa-4x" :title="__('Add New Student')" click="$emit('showModal', 'users.save')"/>
				</div>
				<div class="title">
					<h3>New Student</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
		<div class="tile-title tile-primary">
			<div class="icon">
				<x-ux::link icon="edit fa-4x" :title="__('Input Result')" href="{{ url('/results') }}/0"/>
			</div>
			<div class="title">
				<h3>Input Result</h3><br>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6">
		<div class="tile-title tile-primary">
			<div class="icon">
				<x-ux::link icon="scroll fa-4x" :title="__('Affective Trait')" href="{{ url('/affectives') }}/0"/>
			</div>
			<div class="title">
				<h3>Affective Trait</h3>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6">
		<div class="tile-title tile-primary">
			<div class="icon">
				<x-ux::link icon="calendar-check fa-4x" :title="__('Attendance')" href="{{ url('/attendances') }}/0"/>
			</div>
			<div class="title">
				<h3>Attendance</h3><br>
			</div>
		</div>
	</div>
</div>
<br/><br/> 

<div class="row">
	@foreach($classes as $row)
		<div class="col-md-2 col-sm-4">
			<a href="{{ url('/studentclass') }}/{{ strtoupper($row->name) }}">
			<div class="tile-title ">
				<div class="icon">
				<small>	{{ strtoupper($row->name) }}</small>
				</div>
			</div>
		</a>
		</div>
	@endforeach
		
</div>

</div>


	<div class="col-md-4" style=" background-color:#fff;">
    	<div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
					<a href="{{ url('/noticeboards') }}">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
							{{ '\App\Components\Dashboard'::get_phrase('event_schedule'); }}
                        </div>
					</a>
                    </div>
					 
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
								{{-- <a href="{{ url('/noticeboard') }}">  --}}
                                <div id="notice_calendar"></div>
								{{-- </a> --}}
                            </div>
                        </div>
                    </div>
					 
                </div>
            </div>
        </div>
    </div>
                
    	</div>



 <script>
  $(document).ready(function() {
	  
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						// left: 'today prev,next'
						right: 'prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
					height: 319,
					droppable: false,
					
					events: [
						<?php 
						foreach($notices as $row):
						?>
						{
							title: "{{ $row->notice_title }}",
							start: new Date({{ date('Y',$row->created_timestamp) }},{{ date('m',$row->created_timestamp)-1}}, {{ date('d',$row->created_timestamp) }}),
							end:	new Date({{ date('Y',$row->created_timestamp) }}, {{ date('m',$row->created_timestamp)-1 }},  {{ date('d',$row->created_timestamp) }}) 
						},
						<?php 
						endforeach
						?>
						
					]
				});
	});
  </script> 

</x-ux::layouts.page>