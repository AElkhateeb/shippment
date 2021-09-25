<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MovementMethod\BulkDestroyMovementMethod;
use App\Http\Requests\Admin\MovementMethod\DestroyMovementMethod;
use App\Http\Requests\Admin\MovementMethod\IndexMovementMethod;
use App\Http\Requests\Admin\MovementMethod\StoreMovementMethod;
use App\Http\Requests\Admin\MovementMethod\UpdateMovementMethod;
use App\Models\MovementMethod;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MovementMethodsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMovementMethod $request
     * @return array|Factory|View
     */
    public function index(IndexMovementMethod $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MovementMethod::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'method', 'parent_id'],

            // set columns to searchIn
            ['id', 'method']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.movement-method.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.movement-method.create');

        return view('admin.movement-method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMovementMethod $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMovementMethod $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MovementMethod
        $movementMethod = MovementMethod::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/movement-methods'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/movement-methods');
    }

    /**
     * Display the specified resource.
     *
     * @param MovementMethod $movementMethod
     * @throws AuthorizationException
     * @return void
     */
    public function show(MovementMethod $movementMethod)
    {
        $this->authorize('admin.movement-method.show', $movementMethod);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MovementMethod $movementMethod
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MovementMethod $movementMethod)
    {
        $this->authorize('admin.movement-method.edit', $movementMethod);


        return view('admin.movement-method.edit', [
            'movementMethod' => $movementMethod,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMovementMethod $request
     * @param MovementMethod $movementMethod
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMovementMethod $request, MovementMethod $movementMethod)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MovementMethod
        $movementMethod->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/movement-methods'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/movement-methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMovementMethod $request
     * @param MovementMethod $movementMethod
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMovementMethod $request, MovementMethod $movementMethod)
    {
        $movementMethod->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMovementMethod $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMovementMethod $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MovementMethod::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
