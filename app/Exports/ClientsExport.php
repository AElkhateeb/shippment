<?php

namespace App\Exports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Client::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.client.columns.id'),
            trans('admin.client.columns.phone'),
        ];
    }

    /**
     * @param Client $client
     * @return array
     *
     */
    public function map($client): array
    {
        return [
            $client->id,
            $client->phone,
        ];
    }
}
