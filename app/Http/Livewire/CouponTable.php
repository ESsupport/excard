<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Coupon;

class CouponTable extends DataTableComponent
{

    public function render()
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns'       => $this->columns(),
                'rowView'       => $this->rowView(),
                'filtersView'   => $this->filtersView(),
                'customFilters' => $this->filters(),
                'rows'          => $this->rows,
                'modalsView'    => $this->modalsView(),
                'bulkActions'   => $this->bulkActions,
                'componentName' => 'sadmin.coupons.add-button',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Code", "code")
                ->sortable()->searchable(),
            Column::make("Percentage", "percentage")
                ->sortable()->searchable(),
            Column::make("Use Count", "use_type")
                ->sortable()->searchable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make(__('messages.common.action'))->addClass('w-100px justify-content-center d-flex'),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.coupon_table';
    }

    public function query(): Builder
    {
        return Coupon::select('coupons.*');
    }
}
