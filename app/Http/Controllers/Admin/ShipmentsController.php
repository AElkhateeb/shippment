<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ShipmentsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shipment\BulkDestroyShipment;
use App\Http\Requests\Admin\Shipment\DestroyShipment;
use App\Http\Requests\Admin\Shipment\IndexShipment;
use App\Http\Requests\Admin\Shipment\StoreShipment;
use App\Http\Requests\Admin\Shipment\UpdateShipment;
use App\Models\Road;
use App\Models\Shipment;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\View\View;

class ShipmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexShipment $request
     * @return array|Factory|View
     */
    public function index(IndexShipment $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Shipment::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'pkg_num', 'road_id', 'place_from_id', 'branch_from_id', 'place_to_id', 'branch_to_id', 'weight', 'pickup', 'todoor', 'express', 'breakable', 'shipper_type', 'shipper_id', 'receiver_id', 'status', 'published_at', 'end_at', 'shipp_price', 'shipp_cost', 'shipp_sale', 'shipp_total', 'payment_method_id'],

            // set columns to searchIn
            ['id', 'shipper_type', 'status', 'shipp_price', 'shipp_cost', 'shipp_sale', 'shipp_total'],

            function ($query) use ($request) {
                $query->with(['road']);
                if($request->has('roads')){
                    $query->whereIn('road_id', $request->get('roads'));
                }
                $query->with(['placeFrom']);
                if($request->has('placeFrom')){
                    $query->whereIn('place_from_id', $request->get('placeFrom'));
                }
                $query->with(['placeTo']);
                if($request->has('placeTo')){
                    $query->whereIn('place_to_id', $request->get('placeTo'));
                }
                $query->with(['branchFrom']);
                if($request->has('branchFrom')){
                    $query->whereIn('branch_from_id', $request->get('branchFrom'));
                }
                $query->with(['branchTo']);
                if($request->has('branchTo')){
                    $query->whereIn('branch_to_id', $request->get('branchTo'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.shipment.index', [
            'data' => $data,
            'roads' => Road::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.shipment.create');

        return view('admin.shipment.create', [
            'roads' => Road::all()
        ]

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShipment $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreShipment $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['road_id'] = $request->getRoadId();
        // Store the Shipment
        $shipment = Shipment::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/shipments'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/shipments');
    }

    /**
     * Display the specified resource.
     *
     * @param Shipment $shipment
     * @throws AuthorizationException
     * @return void
     */
    public function show(Shipment $shipment)
    {
        $this->authorize('admin.shipment.show', $shipment);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shipment $shipment
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Shipment $shipment)
    {
        $this->authorize('admin.shipment.edit', $shipment);


        return view('admin.shipment.edit', [
            'shipment' => $shipment,
            'roads' => Road::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShipment $request
     * @param Shipment $shipment
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateShipment $request, Shipment $shipment)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['road_id'] = $request->getRoadId();
        // Update changed values Shipment
        $shipment->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/shipments'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'object' => $shipment
            ];
        }

        return redirect('admin/shipments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyShipment $request
     * @param Shipment $shipment
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyShipment $request, Shipment $shipment)
    {
        $shipment->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyShipment $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyShipment $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Shipment::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Export entities
     *
     * @return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(ShipmentsExport::class), 'shipments.xlsx');
    }
}
