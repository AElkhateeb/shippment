<?php

namespace App\Exports;

use App\Models\Receiver;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReceiversExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Receiver::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.receiver.columns.id'),
            trans('admin.receiver.columns.fullname'),
            trans('admin.receiver.columns.address'),
            trans('admin.receiver.columns.phone'),
            trans('admin.receiver.columns.phone_2'),
            trans('admin.receiver.columns.city'),
            trans('admin.receiver.columns.area'),
            trans('admin.receiver.columns.location'),
            trans('admin.receiver.columns.lng'),
            trans('admin.receiver.columns.lat'),
            trans('admin.receiver.columns.governorate'),
        ];
    }

    /**
     * @param Receiver $receiver
     * @return array
     *
     */
    public function map($receiver): array
    {
        return [
            $receiver->id,
            $receiver->fullname,
            $receiver->address,
            $receiver->phone,
            $receiver->phone_2,
            $receiver->city,
            $receiver->area,
            $receiver->location,
            $receiver->lng,
            $receiver->lat,
            $receiver->governorate,
        ];
    }
}
