<style>
    .duration-center div {
        justify-content: center !important;
    }
</style>
<x-livewire-tables::bs5.table.cell>
    {{$row->name}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="">
    {{$row->code}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="">
    {{$row->percentage}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="te">
  {{$row->use_type}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if ($row->status == 1)
        <div class="form-check form-switch">
            <input class="form-check-input is_status " checked type="checkbox" name="is_default" data-id="{{$row->id}}">
        </div>
    @else
        <div class="form-check form-switch">
            <input class="form-check-input is_status " type="checkbox" name="is_default" data-id="{{$row->id}}">
        </div>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
        <a href="{{ route('coupon.edit', $row->id) }}" title="{{ __('messages.common.edit') }}"
           class="btn px-1 text-primary fs-3">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
           class="btn px-1 text-danger fs-3 coupon-delete-btn" data-turbolinks="false">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>

