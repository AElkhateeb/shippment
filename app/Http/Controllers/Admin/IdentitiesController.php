<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Identity\BulkDestroyIdentity;
use App\Http\Requests\Admin\Identity\DestroyIdentity;
use App\Http\Requests\Admin\Identity\IndexIdentity;
use App\Http\Requests\Admin\Identity\StoreIdentity;
use App\Http\Requests\Admin\Identity\UpdateIdentity;
use App\Models\Identity;
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

class IdentitiesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexIdentity $request
     * @return array|Factory|View
     */
    public function index(IndexIdentity $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Identity::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'text'],

            // set columns to searchIn
            ['id', 'title', 'text']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.identity.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.identity.create');

        return view('admin.identity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIdentity $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreIdentity $request)
    {

        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Identity
        $identity = Identity::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/identities'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/identities');
    }

    /**
     * Display the specified resource.
     *
     * @param Identity $identity
     * @throws AuthorizationException
     * @return void
     */
    public function show(Identity $identity)
    {
        $this->authorize('admin.identity.show', $identity);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Identity $identity
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Identity $identity)
    {
        $this->authorize('admin.identity.edit', $identity);


        return view('admin.identity.edit', [
            'identity' => $identity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIdentity $request
     * @param Identity $identity
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateIdentity $request, Identity $identity)
    {

        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Identity
        $identity->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/identities'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/identities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyIdentity $request
     * @param Identity $identity
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyIdentity $request, Identity $identity)
    {
        $identity->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyIdentity $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyIdentity $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Identity::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
