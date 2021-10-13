<x-ux::layouts.modal :title="!$school->exists ? __('Create School') : __('Update School')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('School Name')" model="name"/>
    @if (Auth::user()->id == '1')
        <x-ux::input :label="__('Contact Person')" model="school_id"/>            
    @endif
        <x-ux::input :label="__('School Email')" model="web"/>
        <x-ux::input :label="__('School Website')" model="web"/>
        <x-ux::selectcolor :label="__('School Colour')" placeholder="Select Colour" :options="['default'=>'Default', 'purple'=>'Purple', 'white'=>'White', 'black'=>'Black', 'red'=>'Red', 'green'=>'Green', 'blue'=>'Blue','cafe'=>'Cafe','yellow'=>'Yellow']" model="colour"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Cancel')" color="secondary" dismiss="modal"/>
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>
