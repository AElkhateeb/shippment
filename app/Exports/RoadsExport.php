<?php

namespace App\Exports;

use App\Models\Road;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RoadsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Road::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.road.columns.id'),
            trans('admin.road.columns.price'),
            trans('admin.road.columns.time'),
            trans('admin.road.columns.enabled'),
            trans('admin.road.columns.pickup'),
            trans('admin.road.columns.todoor'),
            trans('admin.road.columns.express'),
            trans('admin.road.columns.breakable'),
            trans('admin.road.columns.from_id'),
            trans('admin.road.columns.to_id'),
        ];
    }

    /**
     * @param Road $road
     * @return array
     *
     */
    public function map($road): array
    {
        return [
            $road->id,
            $road->price,
            $road->time,
            $road->enabled,
            $road->pickup,
            $road->todoor,
            $road->express,
            $road->breakable,
            $road->from_id,
            $road->to_id,
        ];
    }
}
