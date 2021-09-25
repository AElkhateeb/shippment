<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PlacesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Place\BulkDestroyPlace;
use App\Http\Requests\Admin\Place\DestroyPlace;
use App\Http\Requests\Admin\Place\IndexPlace;
use App\Http\Requests\Admin\Place\StorePlace;
use App\Http\Requests\Admin\Place\UpdatePlace;
use App\Models\Place;
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

class PlacesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPlace $request
     * @return array|Factory|View
     */
    public function index(IndexPlace $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Place::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'enabled', 'parent_id', 'branch_id'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.place.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.place.create');

        return view('admin.place.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlace $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePlace $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Place
        $place = Place::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/places'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/places');
    }

    /**
     * Display the specified resource.
     *
     * @param Place $place
     * @throws AuthorizationException
     * @return void
     */
    public function show(Place $place)
    {
        $this->authorize('admin.place.show', $place);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Place $place
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Place $place)
    {
        $this->authorize('admin.place.edit', $place);


        return view('admin.place.edit', [
            'place' => $place,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlace $request
     * @param Place $place
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePlace $request, Place $place)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Place
        $place->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/places'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/places');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPlace $request
     * @param Place $place
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPlace $request, Place $place)
    {
        $place->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPlace $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPlace $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Place::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(PlacesExport::class), 'places.xlsx');
    }
}
