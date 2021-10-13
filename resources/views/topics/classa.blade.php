<x-ux::layouts.page :title="__('class')">
    {{-- <x-ux::actions search>
        <x-ux::button icon="plus" :title="__('Create')" click="$emit('showModal', 'topics.save')"/>
        <x-ux::action-dropdown key="sort"/>
        <x-ux::action-dropdown key="filter"/>
    </x-ux::actions> --}}
{{--     
<x-ux::layouts.modal :title="__('Update Topic')" submit="save">
    <x-slot name="body"> --}}

@if (count($geta)>0)
    @foreach ($geta as $getas)    
    {{-- {{ dd($getas->note) }} --}}
        <form action="{{route('summernotePersist')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- <input type="text" name="subje" id=""> --}}

            <div class="col-md-12">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select name="subject_id" id="subject" class="form-control">
                        <option>Select Subject</option>
                
                        @forelse ($getSub as $gesub => $we)  
                            @if ($we==$getas->subject_id)                   
                                <option value="{{ $we }}" selected>{{ $gesub }}</option>
                            @else
                                <option value="{{ $we }}">{{ $gesub }}</option> 
                            @endif
                        @empty
                                <option>Please Input subjects</option>
                        @endforelse  
                    </select>

                    <label for="Topic">Topic</label>
                    <input type="text" name="name" id="Topic" class="form-control" value="{{ $getas->name }}">
             
                    <label for="Class">Class</label>
                    <select name="term" id="Term" class="form-control">
                        @if (count($cls[0])>0)
                            @for ($i=0; $i<count($cls[0]);$i++)
                            @php
                                if($cls[0][$i]==$getas->class_id){
                                    $sele='selected';
                                }else {
                                    $sele='';
                                }
                            @endphp
                                <option value="{{ $cls[0][$i] }}" {{ $sele }}>
                                {{ $cls[1][$i] }}</option>
                            @endfor
                        @endif   
                    </select>
                    {{-- <input type="text" name="class_id" id="Class" class="form-control" value="{{ $getas->class_id }}"> --}}

                    <label for="Term">Term</label>
                    {{-- <input type="text" name="term" id="Term" class="form-control" value="{{ $getas->term }}"> --}}
                    
{{-- <x-ux::select :label="__('Term')" :options="['1'=>'1st term', '2'=>'2nd term', '3'=>'3rd term']" model="term"/>                     --}}
                <select name="term" id="Term" class="form-control">
                    @if ($getas->term=='1')
                        <option value="1" selected>1st term</option>
                        <option value="2">2nd term</option>
                        <option value="3">3rd term</option>
                    @elseif ($getas->term=='2')
                        <option value="1">1st term</option>
                        <option value="2" selected>2nd term</option>
                        <option value="3">3rd term</option>
                    @elseif ($getas->term=='3')                        
                        <option value="1">1st term</option>
                        <option value="2">2nd term</option>
                        <option value="3" selected>3rd term</option>
                    @else
                        <option value="1">1st term</option>
                        <option value="2">2nd term</option>
                        <option value="3">3rd term</option> 
                    @endif
                </select>

                    <label for="desciption">Note</label>
                    <textarea name="summernoteInput" id="summernote" class="summernote form-control">{{ $getas->note }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" >Save</button>
                {{-- <x-ux::button :label="__('Save')" type="submit" size="lg"/> --}}
              </div>            
        </form>
    @endforeach
@else
    <p>
      <center> Create a new topic </center> 
    </p>

    <form action="{{route('summernotePersist')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{-- <input type="text" name="subje" id=""> --}}

        <div class="col-md-12">
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject_id" id="subject" class="form-control" value="">
                <label for="Topic">Topic</label>
                <input type="text" name="name" id="Topic" class="form-control" value="">
                <label for="Class">Class</label>
                <input type="text" name="class_id" id="Class" class="form-control" value="">
                <label for="Term">Term</label>
                {{-- <input type="text" name="term" id="Term" class="form-control" value=""> --}}
                <select name="term" id="Term" class="form-control">
                    <option value="1">1st term</option>
                    <option value="2">2nd term</option>
                    <option value="3">3rd term</option>
                </select>

                <label for="desciption">Note</label>
                <textarea name="summernoteInput" id="note" class="summernote form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" >Save</button>
          </div>            
    </form>
@endif
    
    {{-- </x-slot>
</x-ux::layouts.modal> --}}
    {{-- <x-ux::pagination :links="$topics"/> --}}
</x-ux::layouts.page>


<script>
    $(document).ready(function() {
$('.summernote').summernote({
      placeholder: 'Type here',
      tabsize: 2,
      height: 200,
	  dialogsInBody: true   
    });
});
</script>