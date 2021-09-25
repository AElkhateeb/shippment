<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteOption\BulkDestroySiteOption;
use App\Http\Requests\Admin\SiteOption\DestroySiteOption;
use App\Http\Requests\Admin\SiteOption\IndexSiteOption;
use App\Http\Requests\Admin\SiteOption\StoreSiteOption;
use App\Http\Requests\Admin\SiteOption\UpdateSiteOption;
use App\Models\SiteOption;
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

class SiteOptionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSiteOption $request
     * @return array|Factory|View
     */
    public function index(IndexSiteOption $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SiteOption::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['weight_default', 'weight_fee', 'pickup', 'pickup_fee', 'todoor', 'todoor_fee', 'express', 'express_fee', 'breakable', 'breakable_fee'],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.site-option.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.site-option.create');

        return view('admin.site-option.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSiteOption $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSiteOption $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SiteOption
        $siteOption = SiteOption::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/site-options'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/site-options');
    }

    /**
     * Display the specified resource.
     *
     * @param SiteOption $siteOption
     * @throws AuthorizationException
     * @return void
     */
    public function show(SiteOption $siteOption)
    {
        $this->authorize('admin.site-option.show', $siteOption);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SiteOption $siteOption
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SiteOption $siteOption)
    {
        $this->authorize('admin.site-option.edit', $siteOption);


        return view('admin.site-option.edit', [
            'siteOption' => $siteOption,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSiteOption $request
     * @param SiteOption $siteOption
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSiteOption $request, SiteOption $siteOption)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SiteOption
        $siteOption->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/site-options'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/site-options');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySiteOption $request
     * @param SiteOption $siteOption
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySiteOption $request, SiteOption $siteOption)
    {
        $siteOption->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySiteOption $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySiteOption $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SiteOption::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
