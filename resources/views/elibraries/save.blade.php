<x-ux::layouts.modal :title="!$elibrary->exists ? __('Create Elibrary') : __('Update Elibrary')" submit="save">
    @php
    $pt =$sub = array(); 
     foreach ($getClass as $key => $name){    
         $pt[$name]=$key;
     }
     foreach ($getSubject as $keys => $names){    
         $sub[$names]=$keys;
     }      
    @endphp

    <x-slot name="body">
        {{-- <x-ux::input :label="__('Name')" model="name"/> --}}
        <x-ux::input :label="__('PDF Book File')" model="pdf" id="pdf" wire:change="$emit('fileChosenpdf')" type="file" accept=".pdf" required/>
        <x-ux::input :label="__('JPEG Book Picture')" model="jpg" id="jpg" wire:change="$emit('fileChosenjpg')" type="file" accept="image/*" required/>
        <x-ux::select :label="__('Class')" :options="$pt" placeholder="Select Class" model="class_id"/> 
        <x-ux::select :label="__('Subject')" :options="$sub" placeholder="Select Subject" model="subject_id"/> 
        <x-ux::radio :label="__('Type of Material')" :options="['ebook'=>'eBook', 'pq'=>'Past Question']" model="type" required/>
    </x-slot>
 
    <x-slot name="footer">
        <x-ux::button :label="__('Cancel')" color="secondary" dismiss="modal"/>
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>


 
<script>
    // Upload PDF
    window.Livewire.on('fileChosenpdf', () => {
        let myPass = document.getElementById('pdf');
        let file = myPass.files[0];
        let reader = new FileReader();
        reader.onloadend = ()=>{
            window.Livewire.emit('fileUpload',reader.result);
            // console.log(reader.result);
        }
        reader.readAsDataURL(file);
    })
// Upload picture
    window.Livewire.on('fileChosenjpg', () => {
        let myPass = document.getElementById('jpg');
        let file = myPass.files[0];
        let reader = new FileReader();
        reader.onloadend = ()=>{
            window.Livewire.emit('fileUpload',reader.result);
            // console.log(reader.result);
        }
        reader.readAsDataURL(file);
    })
    </script>