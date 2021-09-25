<?php

namespace App\Exports;

use App\Models\Branch;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BranchesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Branch::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.branch.columns.id'),
            trans('admin.branch.columns.location'),
            trans('admin.branch.columns.lng'),
            trans('admin.branch.columns.lat'),
            trans('admin.branch.columns.name'),
            trans('admin.branch.columns.governorate'),
            trans('admin.branch.columns.is_published'),
            trans('admin.branch.columns.manger'),
            trans('admin.branch.columns.agent'),
        ];
    }

    /**
     * @param Branch $branch
     * @return array
     *
     */
    public function map($branch): array
    {
        return [
            $branch->id,
            $branch->location,
            $branch->lng,
            $branch->lat,
            $branch->name,
            $branch->governorate,
            $branch->is_published,
            $branch->manger,
            $branch->agent,
        ];
    }
}
