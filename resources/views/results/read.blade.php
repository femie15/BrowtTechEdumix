<x-ux::layouts.modal :title="__('Result')">
    <x-slot name="body">
        {{-- <x-ux::desc :title="__('ID')" :data="$result->id"/> --}}
        <x-ux::desc :title="__('Name')" :data="$result->name"/>
        {{-- <x-ux::desc :title="__('Created At')" :date="$result->created_at"/>
        <x-ux::desc :title="__('Updated At')" :date="$result->updated_at"/> --}}
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Close')" color="secondary" dismiss="modal"/>
    </x-slot>
</x-ux::layouts.modal>
