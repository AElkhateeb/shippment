<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MovementsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movement\BulkDestroyMovement;
use App\Http\Requests\Admin\Movement\DestroyMovement;
use App\Http\Requests\Admin\Movement\IndexMovement;
use App\Http\Requests\Admin\Movement\StoreMovement;
use App\Http\Requests\Admin\Movement\UpdateMovement;
use App\Models\Movement;
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

class MovementsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMovement $request
     * @return array|Factory|View
     */
    public function index(IndexMovement $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Movement::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'reason', 'shipment_id', 'method_id', 'employee_type', 'employee_id', 'branch_id', 'method_parent_id'],

            // set columns to searchIn
            ['id', 'reason', 'employee_type']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.movement.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.movement.create');

        return view('admin.movement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMovement $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMovement $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Movement
        $movement = Movement::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/movements'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/movements');
    }

    /**
     * Display the specified resource.
     *
     * @param Movement $movement
     * @throws AuthorizationException
     * @return void
     */
    public function show(Movement $movement)
    {
        $this->authorize('admin.movement.show', $movement);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movement $movement
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Movement $movement)
    {
        $this->authorize('admin.movement.edit', $movement);


        return view('admin.movement.edit', [
            'movement' => $movement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMovement $request
     * @param Movement $movement
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMovement $request, Movement $movement)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Movement
        $movement->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/movements'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/movements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMovement $request
     * @param Movement $movement
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMovement $request, Movement $movement)
    {
        $movement->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMovement $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMovement $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Movement::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(MovementsExport::class), 'movements.xlsx');
    }
}
