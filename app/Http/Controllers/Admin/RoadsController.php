<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RoadsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Road\BulkDestroyRoad;
use App\Http\Requests\Admin\Road\DestroyRoad;
use App\Http\Requests\Admin\Road\IndexRoad;
use App\Http\Requests\Admin\Road\StoreRoad;
use App\Http\Requests\Admin\Road\UpdateRoad;
use App\Models\Road;
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

class RoadsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRoad $request
     * @return array|Factory|View
     */
    public function index(IndexRoad $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Road::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'price', 'time', 'enabled', 'pickup', 'todoor', 'express', 'breakable', 'from_id', 'to_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.road.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.road.create');

        return view('admin.road.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoad $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRoad $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Road
        $road = Road::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/roads'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/roads');
    }

    /**
     * Display the specified resource.
     *
     * @param Road $road
     * @throws AuthorizationException
     * @return void
     */
    public function show(Road $road)
    {
        $this->authorize('admin.road.show', $road);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Road $road
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Road $road)
    {
        $this->authorize('admin.road.edit', $road);


        return view('admin.road.edit', [
            'road' => $road,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoad $request
     * @param Road $road
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRoad $request, Road $road)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Road
        $road->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/roads'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/roads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRoad $request
     * @param Road $road
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRoad $request, Road $road)
    {
        $road->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRoad $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRoad $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Road::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(RoadsExport::class), 'roads.xlsx');
    }
}
