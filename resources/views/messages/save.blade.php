<x-ux::layouts.modal :title="!$talks ? __('Start a Conversation') : __('Conversations')" submit="save" size="lg" name="ket">

<x-slot name="body">
        {{-- <x-ux::input :label="__('Name')" model="name"/> --}}
   

<div wire:poll.750ms>

<center style="color: rgb(112, 112, 243);">
    Current time: {{ now() }} 
    <hr>
    @if ($errors)
                                @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endif
</center>
    

    <!-- Direct Chat -->
    <div class="row justify-content-center" >

     
        <br>

        <div class="col-md-12">
            <!-- DIRECT CHAT DANGER -->
            <div class="card">
                <div class="card card-danger direct-chat direct-chat-danger">
                {{-- <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                </div> --}}
                <!-- /.card-header -->
            <div class="card">
                <div class="card-body">
 @if (count($talks)>0)
                    <div class="direct-chat-messages" id="chata" style="height: 70vh;">

                        <!-- Sender meassage --> 

{{-- {{ dd($message )}} --}}

                        @foreach($talks as $messa)
{{-- {{ dd(Auth::user()->timezone)}} --}}
{{-- @php
$vum=$messa->sender;    
@endphp                             --}}
{{-- {{ dd($messa)}} --}}
                        @if($messa->sender == Auth::user()->id)
<br>
                                <div class="direct-chat-msg right" >
                                    <span style="float:right">
                                    <div class="direct-chat-infos clearfix" >
                                        <span class="direct-chat-name float-right" style="float:right">.</span>
                                        <span class="direct-chat-timestamp float-right" style="float:right">
                                            {{ \Carbon\Carbon::parse($messa->created_at)->diffForHumans()}}
                                        </span>
                                    </div>
                                    
                                    <!-- /.direct-chat-infos -->
                                    {{-- <img class="direct-chat-img" src="{{asset('assets/images/users/user.jpg')}}" alt="Message User Image"> --}}
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text" style="background-color:rgb(233, 243, 233); float:right; width:80%;">
                                        {{$messa->message}}
                                        <br>
                                        <small style="color:rgba(51, 51, 122, 0.37);">{{ \Carbon\Carbon::parse($messa->created_at)->timezone(Auth::user()->timezone)->toDayDateTimeString() }}</small>
                                    </div>
                                </span>
                                    <!-- /.direct-chat-text -->
                                </div>


                            @else
<br>
                                <div class="direct-chat-msg">
                                    <span style="float:left;">
                                    <div class="direct-chat-infos clearfix" >
                                        <span class="direct-chat-name float-left">{{ $mename }}</span>
                                        <span class="direct-chat-timestamp float-right"> 
                                            ({{ \Carbon\Carbon::parse($messa->created_at)->diffForHumans()}})
                                        </span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="{{asset('assets/images/users/user.jpg')}}" alt="Message User Image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text" style="background-color:rgb(240, 218, 218); width:80%;">
                                        {{$messa->message}}
                                        <br>
                                        <small style="color:rgba(51, 51, 122, 0.37);">{{ \Carbon\Carbon::parse($messa->created_at)->timezone(Auth::user()->timezone)->toDayDateTimeString() }}</small>
                                    </div>
                                </span>
                                    <!-- /.direct-chat-text -->
                                </div>

                            @endif
                          @endforeach

                        </div>

                        @else
                                    <h5 style="text-align: center;color:red"> Say Hello !</h5>
                        @endif


    
                </div>
                <!-- /.card-body -->
                <div class="type_msg" > 
                        <div class="input-group"> 

                            {{-- <textarea id="mytextarea">
                                <p>To insert a 🙂 emoji, either:</p><ul><li>Type a colon followed by a keyword, e.g., <code>:smile</code>, then press <em>Enter</em> or&nbsp;<em>Return</em> to add the highlighted emoji, or click the desired emoji from those displayed, or</li><li>Select the emoticons toolbar button to open the picker, and use the tabs or search bar to browse, then click the desired emoji</li></ul><p>Try it here!&nbsp;</p>
                            </textarea> --}}

                            <br>
                            {{-- <textarea id="text" onkeydown="scrollDown()"></textarea>  --}}

                                <input type="text" inputmode="text" id="message" name="message"  wire:model.defer="model.message" class="form-control rounded-end write_msg" onkeydown="scrollDown()" data-emojiable="true" data-emoji-input="unicode">                             
                            
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-success" onmouseup="clr()"> <i class="fas fa-paper-plane"></i> Send</button>  
                            </span> 
                        </div> 
                </div>


                <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>








{{-- emoji --}}
  <!-- Begin emoji-picker JavaScript -->
  <script src="{{asset('assets/emoji/js/config.js')}}"></script>
  <script src="{{asset('assets/emoji/js/util.js')}}"></script>
  <script src="{{asset('assets/emoji/js/jquery.emojiarea.js')}}"></script>
  <script src="{{asset('assets/emoji/js/emoji-picker.js')}}"></script>
  <!-- End emoji-picker JavaScript -->

  <script>
    $(function() {
      // Initializes and creates emoji set from sprite sheet
      window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '{{asset("assets/emoji/img/")}}',
        popupButtonClasses: 'fa fa-smile-o'
      });
      // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
      // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
      // It can be called as many times as necessary; previously converted input fields will not be converted again
      window.emojiPicker.discover();
    });


  </script>
  <script>
    // Google Analytics
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-49610253-3', 'auto');
    ga('send', 'pageview');
  </script>







</x-slot>




{{-- <x-slot name="footer">

    <x-ux::button :label="__('Cancel')" color="danger" dismiss="modal"/>
    <x-ux::button :label="__('Save')" type="submit"/>
</x-slot> --}}
</x-ux::layouts.modal>


<script>

     function clr() {    
    document.getElementById("message").value="";   
	var form = document.getElementByName("ket");
form.reset(); 
    }

</script>