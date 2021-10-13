@section('title')
    @yield('title')
@endsection
@php 
    $page_name =  strtolower(e($__env->yieldContent('title')));
    $class_id=3;
@endphp

@foreach ($settings as $setting) 
    @if ($setting->type=='skin_colour')
        @php
            $color=$setting->description;
        @endphp
    @endif
@endforeach

<div class="sidebar-menu">
  <header class="logo-env" >

      <!-- logo -->
      <div class="logo" style="">
          <a href="">
              <img src="../assets/images/favicon.png"  style="max-height:70px;"/>
          </a>
      </div>

      <!-- logo collapse icon -->
      <div class="sidebar-collapse" style="">
          <a href="#" class="sidebar-collapse-icon with-animation">
              <i class="entypo-switch"></i>
          </a>
      </div>

      <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
      <div class="sidebar-mobile-menu visible-xs">
          <a href="#" class="with-animation">
              <i class="entypo-menu"></i>
          </a>
      </div>
  </header>

  <div style=""></div>	
  <ul id="main-menu" class="">
      <!-- add class "multiple-expanded" to allow multiple submenus to open -->
      <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
     

      <!-- DASHBOARD -->
      <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
          <a href="{{ url('/dashboard') }}">
            {{-- {{ $page_name }} --}}
              <i class="entypo-gauge"></i>              
              <span>{{ __('dashboard') }}</span>
          </a>
      </li>

      <!-- STUDENT -->
      <li class="<?php
      if ($page_name == 'add student' ||
              $page_name == 'student_bulk_add' ||
              $page_name == 'student_information' ||
              $page_name == 'student_marksheet')
          echo 'opened active has-sub';
      ?> ">
          <a href="#">
              <i class="fa fa-group"></i>
              <span>{{ __('student') }}</span>
          </a>
          <ul>
              <!-- STUDENT ADMISSION -->
              {{-- <li class="<?php if ($page_name == 'student_add') echo 'active'; ?> ">
                  <a href="student_add">
                      <span><i class="entypo-dot"></i> {{ __('admit_student') }}</span>
                  </a>
              </li> --}}           

              <!-- STUDENT INFORMATION -->
              <li class="<?php if ($page_name == 'student' || $page_name == 'student_marksheet') echo 'opened active'; ?> ">
                  <a href="#">
                      <span><i class="entypo-database"></i>Students Class Records</span>
                  </a>
                  <ul>
                       @foreach ($classes as $row)
                            <li class="<?php  if ($page_name == 'student' || $page_name == 'student_marksheet' || $page_name == 'studenclass') echo 'active'; ?>"> 
                               <a href="{{ url('/studentclass') }}/{{ $row->name}}">
                                   <span>{{ $row->name }}</span>
                               </a>
                           </li>
                       @endforeach
                       <li class="<?php  if ($page_name == 'Student') echo 'active'; ?>">
                        <a href="{{ url('/student') }}">
                            <span>{{ __('View All Students') }}</span>
                        </a>
                    </li>
                  </ul>
              </li>
              
              
              <!--Promotion-->
      <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
        <a href="{{ url('/book') }}">
          <i class="entypo-up"></i>
          <span>{{ __('promotion') }}</span>
        </a>
      </li>
      
      
          </ul>
      </li>

      <!-- TEACHER -->
      <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
          <a href="{{ url('/teacher') }}">
              <i class="entypo-users"></i>
              <span>{{ __('teachers') }}</span>
          </a>
      </li>

      <!-- PARENTS -->
      <li class="<?php if ($page_name == 'parent') echo 'active'; ?> ">
          <a href="{{ url('/parent') }}">
              <i class="entypo-user"></i>
              <span>{{ __('parents') }}</span>
          </a>
      </li>

      <!-- CLASS -->
<!--       <li class="<?php
      if ($page_name == 'class' ||
              $page_name == 'section')
          echo 'opened active';
      ?> ">
          <a href="#">
              <i class="entypo-flow-tree"></i>
              <span>{{ __('class') }}</span>
          </a>
          <ul>
              <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                  <a href="classes">
                      <span><i class="entypo-dot"></i> {{ __('manage_classes') }}</span>
                  </a>
              </li>
              <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                  <a href="section">
                      <span><i class="entypo-dot"></i> {{ __('manage_sections') }}</span>
                  </a>
              </li>
          </ul>
      </li>-->

      <!-- SUBJECT -->
      <!--<li class="<?php if ($page_name == 'subject') echo 'opened active'; ?> ">
          <a href="#">
              <i class="entypo-docs"></i>
              <span>{{ __('subject') }}</span>
          </a>
          <ul>
              {{-- <?php
              // $classes = $this->db->get('class')->result_array();
              // foreach ($classes as $row):
              //     ?>
              //     <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active'; ?>">
              //         <a href="{{ url('/subject') }}/<?php echo $row['class_id']; ?>">
              //             <span>{{ __('class') }} <?php echo $row['name']; ?></span>
              //         </a>
              //     </li>
              // <?php //endforeach; ?> --}}
          </ul>
      </li>-->

      <!-- CLASS ROUTINE -->
    <!--  <li class="<?php if ($page_name == 'class_routine') echo 'active'; ?> ">
          <a href="class_routine">
              <i class="entypo-target"></i>
              <span>{{ __('class_routine') }}</span>
          </a>
      </li>-->

      <!-- DAILY ATTENDANCE -->
     <!-- <li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
          <a href="manage_attendance/<?php echo date("d/m/Y"); ?>">
              <i class="entypo-chart-area"></i>
              <span>{{ __('daily_attendance') }}</span>
          </a>

      </li>-->

      <!-- EXAMS -->
      <li class="<?php
      if ($page_name == 'results' ||
            $page_name == 'grade' ||
            $page_name == 'marks' ||
                $page_name == 'exam_marks_sms' ||
                    $page_name == 'tab' ||
                    $page_name == 'study' ||
                    $page_name == 'eLibrary' ||
                    $page_name == 'topics')
                          echo 'opened active';
      ?>"> 
          <a href="#">
              <i class="entypo-graduation-cap"></i>
              <span>{{ __('Academics') }}</span>
          </a>
          <ul>
             <!-- <li class="<?php if ($page_name == 'exam') echo 'active'; ?> ">
                  <a href="exam">
                      <span><i class="entypo-dot"></i> {{ __('exam_list') }}</span>
                  </a>
              </li>-->
             <!-- <li class="<?php if ($page_name == 'grade') echo 'active'; ?> ">
                  <a href="grade">
                      <span><i class="entypo-dot"></i> {{ __('exam_grades') }}</span>
                  </a>
              </li> -->
              {{-- <li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                  <a href="pm/marks.php?subject=<?php echo md5($this->session->userdata('email'));?>&class=<?php echo md5(admin);?>&classo=<?php echo ($this->session->userdata('admin_id'));?>&school=<?php echo md5($this->session->userdata('name'));?>">
                      <span><i class="entypo-book"></i> {{ __('manage_marks') }}</span>
                  </a>
              </li> --}}
              <!--<li class="<?php if ($page_name == 'exam_marks_sms') echo 'active'; ?> ">
                  <a href="exam_marks_sms">
                      <span><i class="entypo-dot"></i> {{ __('send_marks_by_sms') }}</span>
                  </a>
              </li>-->
              <li class="<?php if ($page_name == 'tabulation_sheet') echo 'active'; ?> ">
                  {{-- <a href="pm/trait.php?subject=<?php echo md5($this->session->userdata('email'));?>&class=<?php echo md5(admin);?>&classo=<?php echo ($this->session->userdata('admin_id'));?>&school=<?php echo md5($this->session->userdata('name'));?>">
                      <span><i class="entypo-chart-bar"></i> Affective / Psychomotor</span>
                  </a> --}}
              </li>
<!---------------------------------------------------->
               <li class="<?php if ($page_name == 'topics') echo 'active'; ?> ">
                  <a href="{{ url('/topics') }}">
                      <i class="entypo-book"></i>
                      <span>{{ __('Lesson Notes') }}</span>
                  </a>
                </li>
                <li class="<?php if ($page_name == 'study') echo 'active'; ?> ">
                    <a href="{{ url('/study') }}">
                        <i class="entypo-book-open"></i>
                        <span>{{ __('Read Lesson Notes') }}</span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'eLibrary') echo 'active'; ?> ">
                    <a href="{{ url('/elibrary') }}">
                        <i class="entypo-book"></i>
                        <i class="entypo-book" style="margin-left: -22px;"></i>
                        <span>{{ __('E-Library') }}</span>
                    </a>
                </li>

                <li class="<?php if ($page_name == 'results') echo 'active'; ?> ">
                    <a href="{{ url('/results') }}/0">
                        <i class="entypo-calendar"></i>
                        <span>Record students mark</span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'tab') echo 'active'; ?> ">
                    <a href="{{ url('/tabulation') }}">
                        <i class="entypo-layout"></i>
                        <span>Tabulation Sheet</span>
                    </a>
                </li>
            
          </ul>
      </li>

      <!-- PAYMENT -->
  <!--<li class="<?php //if ($page_name == 'invoice') echo 'active'; ?> ">
          <a href="<?php //echo base_url(); ?>invoice">
              <i class="entypo-credit-card"></i>
              <span>{{ __('payment') }}</span>
          </a>
      </li> -->

      <!-- ACCOUNTING -->
      <!--<li class="<?php
      if ($page_name == 'income' ||
              $page_name == 'expense' ||
                  $page_name == 'expense_category' ||
                      $page_name == 'student_payment')
                          echo 'opened active';
      ?> ">
          <a href="#">
              <i class="entypo-suitcase"></i>
              <span>{{ __('accounting') }}</span>
          </a>
          <ul>
              <li class="<?php if ($page_name == 'student_payment') echo 'active'; ?> ">
                  <a href="student_payment">
                      <span><i class="entypo-dot"></i> {{ __('create_student_payment') }}</span>
                  </a>
              </li>
              <li class="<?php if ($page_name == 'income') echo 'active'; ?> ">
                  <a href="income">
                      <span><i class="entypo-dot"></i>{{ __('student_payments') }}</span>
                  </a>
              </li>
              <li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
                  <a href="expense">
                      <span><i class="entypo-dot"></i>{{ __('expense') }}</span>
                  </a>
              </li>
              <li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
                  <a href="expense_category">
                      <span><i class="entypo-dot"></i> {{ __('expense_category') }}</span>
                  </a>
              </li>
          </ul>
      </li>

      <!-- TEACHER Remark --
   
   <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
          <a href="pm/comment.php">
              <i class="entypo-book"></i>
              <span>{{ __('techers_remark') }}</span>
          </a>
      </li>

      <!-- TRANSPORT -->
     <!-- <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
          <a href="transport">
              <i class="entypo-location"></i>
              <span>{{ __('transport') }}</span>
          </a>
      </li>-->

    <!-- VIEW ATTENDANCE -->
      <!-- <li class="<?php if ($page_name == 'exam_marks_sms') echo 'active'; ?> ">
                  <a href="exam_marks_sms">					
                      <span><i class="entypo-chart-area"></i> {{ __('send_marks_by_sms') }}</span>
                  </a>
              </li> -->
  
  
  
  
      <!-- DORMITORY -->
     <!-- <li class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
          <a href="dormitory">
              <i class="entypo-check"></i>
              <span>{{ __('dormitory') }}</span>
          </a>
      </li>-->

      <!-- PAYMENT -->
      {{-- <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
          <a href="invoice">
              <i class="entypo-credit-card"></i>
              <span>{{ __('school_fees') }}</span>
          </a>
      </li> --}}

      <!-- NOTICEBOARD -->
      <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
          <a href="{{ url('/noticeboards') }}">
              <i class="entypo-doc-text-inv"></i>
              <span>{{ __('noticeboard') }}</span>
          </a>
      </li>

      <!-- MESSAGE -->
     <li class="<?php if ($page_name == 'messages') echo 'active'; ?> ">
          <a href="{{ url('/messages') }}">
              <i class="entypo-chat"></i>
              <span>{{ __('Chat') }}</span>
          </a>
      </li> 

      <!-- SETTINGS -->
    {{-- {{ dd('\App\Components\Schools\Save'::getSchool(Auth::user()->id)) }} --}}
     <!-- SETTINGS -->
      <li class="<?php
      if ($page_name == 'system_settings' ||
              $page_name == 'manage_language' ||
                  $page_name == 'sms_settings' ||
                  $page_name == 'subjects')
                      echo 'opened active';
      ?> ">
          <a href="#">
              <i class="entypo-lifebuoy"></i>
              <span>{{ __('settings') }}</span>
          </a>
          <ul>

    @if ('\App\Components\Schools\Save'::getSchool(Auth::user()->school_id)== '' )
        <li class="<?php if ($page_name == 'subjects') echo 'active'; ?> ">
            <x-ux::link :label="__('School Information')" icon="cog" click="$emit('showModal', 'schools.save')"/>
        </li>
    @else
    <li class="<?php if ($page_name == 'subjects') echo 'active'; ?> ">
        <x-ux::link :label="__('School Information')" icon="cog" click="$emit('showModal', 'schools.save', {{'\App\Components\Schools\Save'::getSchool(Auth::user()->school_id) }})"/>
    </li>
    @endif
    
    <li class="<?php if ($page_name == 'terms') echo 'active'; ?> ">
        <a href="{{ url('/terms') }}">
            <span><i class="entypo-calendar"></i>{{ __('Set Term & Session') }}</span>
        </a>
    </li>
                <!-- CLASS ROUTINE -->
    <li class="<?php if ($page_name == 'sections') echo 'active'; ?> ">
        <a href="{{ url('/sections') }}">
            <span><i class="entypo-target"></i>{{ __('Class Sections') }}</span>
        </a>
    </li>

    <li class="<?php if ($page_name == 'subjects') echo 'active'; ?> ">
      <a href="{{ url('/subjects') }}">
          <span><i class="entypo-book"></i>{{ __('Manage Subjects') }}</span>
      </a>
  </li>


      <li class="<?php if ($page_name == 'class_routine') echo 'active'; ?> ">
        <a href="class_routine">
          <i class="entypo-target"></i>
          <span>Set Subject Teachers</span>
        </a>
      </li>
    <!--	<li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
            <a href="grade">
            <i class="entypo-calendar"></i>
              <span>Term End/Start</span>
            </a>
       </li>-->
      {{-- <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
        <a href="manage_profile">
          <i class="entypo-lock"></i>
          <span>{{ __('account') }}</span>
        </a>
      </li> --}}
      <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
        <a href="book">
          <i class="entypo-picture"></i>
          <span>{{ __('school_logo_principal_signature') }}</span>
        </a>
      </li>
           
           <!--   <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                  <a href="system_settings">
                      <span><i class="entypo-dot"></i> {{ __('general_settings') }}</span>
                  </a>
              </li>
              <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                  <a href="sms_settings">
                      <span><i class="entypo-dot"></i> {{ __('sms_settings') }}</span>
                  </a>
              </li>
              <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                  <a href="manage_language">
                      <span><i class="entypo-dot"></i> {{ __('language_settings') }}</span>
                  </a>
              </li>-->
          </ul>
      </li>

<!--	 <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                  <a href="../pry">
        <i class="entypo-back"></i>
                      <span>Goto Primary Section</span>
                  </a>
       </li>
       
   <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                  <a href="grade">
        <i class="entypo-calendar"></i>
                      <span>{{ __('term_date') }}</span>
                  </a>
       </li>-->
       
       <li>
                  <a href="../../">
        <i class="entypo-globe"></i>
                      <span>{{ __('School Website') }}</span>
                  </a>
       </li>
       
       <li>
        <a wire:click="logout">
            <i class="entypo-logout"></i>
            <span> Logout
            </span>
        </a>
    </li>
  </ul>
</div>
    <!-- /.sidebar END-->