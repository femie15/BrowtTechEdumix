<x-ux::layouts.modal :title="__('School')">
    <x-slot name="body">
        {{-- <x-ux::desc :title="__('ID')" :data="$school->id"/> --}}
        <x-ux::desc :title="__('Name')" :data="$school->name"/>
        <x-ux::desc :title="__('Contact Person')" :data="'\App\Components\Users\Read'::getUser($school->school_id)"/>
        <x-ux::desc :title="__('School website')" :data="$school->web"/>
        <x-ux::desc :title="__('School Email')" :data="$school->email"/>
        <div style="background-color: {{ $school->colour }}; color:#fff;">School Colour</div>
        {{-- <x-ux::desc :title="__('Created At')" :date="$school->created_at"/>
        <x-ux::desc :title="__('Updated At')" :date="$school->updated_at"/> --}}
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Close')" color="secondary" dismiss="modal"/>
    </x-slot>
</x-ux::layouts.modal>



                        