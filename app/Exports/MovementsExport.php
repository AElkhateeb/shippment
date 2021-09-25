<?php

namespace App\Exports;

use App\Models\Movement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MovementsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Movement::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.movement.columns.id'),
            trans('admin.movement.columns.reason'),
            trans('admin.movement.columns.shipment_id'),
            trans('admin.movement.columns.method_id'),
            trans('admin.movement.columns.employee_type'),
            trans('admin.movement.columns.employee_id'),
            trans('admin.movement.columns.branch_id'),
            trans('admin.movement.columns.method_parent_id'),
        ];
    }

    /**
     * @param Movement $movement
     * @return array
     *
     */
    public function map($movement): array
    {
        return [
            $movement->id,
            $movement->reason,
            $movement->shipment_id,
            $movement->method_id,
            $movement->employee_type,
            $movement->employee_id,
            $movement->branch_id,
            $movement->method_parent_id,
        ];
    }
}
