<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WaysExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Way\BulkDestroyWay;
use App\Http\Requests\Admin\Way\DestroyWay;
use App\Http\Requests\Admin\Way\IndexWay;
use App\Http\Requests\Admin\Way\StoreWay;
use App\Http\Requests\Admin\Way\UpdateWay;
use App\Models\Way;
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

class WaysController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWay $request
     * @return array|Factory|View
     */
    public function index(IndexWay $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Way::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'price', 'time', 'enabled', 'from_id', 'to_id'],

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

        return view('admin.way.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.way.create');

        return view('admin.way.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWay $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWay $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Way
        $way = Way::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ways'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ways');
    }

    /**
     * Display the specified resource.
     *
     * @param Way $way
     * @throws AuthorizationException
     * @return void
     */
    public function show(Way $way)
    {
        $this->authorize('admin.way.show', $way);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Way $way
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Way $way)
    {
        $this->authorize('admin.way.edit', $way);


        return view('admin.way.edit', [
            'way' => $way,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWay $request
     * @param Way $way
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWay $request, Way $way)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Way
        $way->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ways'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ways');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWay $request
     * @param Way $way
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWay $request, Way $way)
    {
        $way->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWay $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWay $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Way::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(WaysExport::class), 'ways.xlsx');
    }
}
