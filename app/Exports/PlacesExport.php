<?php

namespace App\Exports;

use App\Models\Place;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PlacesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Place::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.place.columns.id'),
            trans('admin.place.columns.name'),
            trans('admin.place.columns.enabled'),
            trans('admin.place.columns.parent_id'),
            trans('admin.place.columns.branch_id'),
        ];
    }

    /**
     * @param Place $place
     * @return array
     *
     */
    public function map($place): array
    {
        return [
            $place->id,
            $place->name,
            $place->enabled,
            $place->parent_id,
            $place->branch_id,
        ];
    }
}
