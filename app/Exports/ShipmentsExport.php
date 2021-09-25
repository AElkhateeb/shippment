<?php

namespace App\Exports;

use App\Models\Shipment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ShipmentsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Shipment::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.shipment.columns.id'),
            trans('admin.shipment.columns.pkg_num'),
            trans('admin.shipment.columns.road_id'),
            trans('admin.shipment.columns.place_from_id'),
            trans('admin.shipment.columns.branch_from_id'),
            trans('admin.shipment.columns.place_to_id'),
            trans('admin.shipment.columns.branch_to_id'),
            trans('admin.shipment.columns.weight'),
            trans('admin.shipment.columns.pickup'),
            trans('admin.shipment.columns.todoor'),
            trans('admin.shipment.columns.express'),
            trans('admin.shipment.columns.breakable'),
            trans('admin.shipment.columns.shipper_type'),
            trans('admin.shipment.columns.shipper_id'),
            trans('admin.shipment.columns.receiver_id'),
            trans('admin.shipment.columns.status'),
            trans('admin.shipment.columns.published_at'),
            trans('admin.shipment.columns.end_at'),
            trans('admin.shipment.columns.shipp_price'),
            trans('admin.shipment.columns.shipp_cost'),
            trans('admin.shipment.columns.shipp_sale'),
            trans('admin.shipment.columns.shipp_total'),
            trans('admin.shipment.columns.payment_method_id'),
        ];
    }

    /**
     * @param Shipment $shipment
     * @return array
     *
     */
    public function map($shipment): array
    {
        return [
            $shipment->id,
            $shipment->pkg_num,
            $shipment->road_id,
            $shipment->place_from_id,
            $shipment->branch_from_id,
            $shipment->place_to_id,
            $shipment->branch_to_id,
            $shipment->weight,
            $shipment->pickup,
            $shipment->todoor,
            $shipment->express,
            $shipment->breakable,
            $shipment->shipper_type,
            $shipment->shipper_id,
            $shipment->receiver_id,
            $shipment->status,
            $shipment->published_at,
            $shipment->end_at,
            $shipment->shipp_price,
            $shipment->shipp_cost,
            $shipment->shipp_sale,
            $shipment->shipp_total,
            $shipment->payment_method_id,
        ];
    }
}
