<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReceiveresExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Receivere\BulkDestroyReceivere;
use App\Http\Requests\Admin\Receivere\DestroyReceivere;
use App\Http\Requests\Admin\Receivere\IndexReceivere;
use App\Http\Requests\Admin\Receivere\StoreReceivere;
use App\Http\Requests\Admin\Receivere\UpdateReceivere;
use App\Models\Receivere;
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

class ReceiveresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReceivere $request
     * @return array|Factory|View
     */
    public function index(IndexReceivere $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Receivere::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'fullname', 'address', 'phone', 'phone_2', 'city', 'area'],

            // set columns to searchIn
            ['id', 'fullname', 'address', 'phone', 'phone_2', 'city', 'area']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.receivere.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.receivere.create');

        return view('admin.receivere.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReceivere $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReceivere $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Receivere
        $receivere = Receivere::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/receiveres'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/receiveres');
    }

    /**
     * Display the specified resource.
     *
     * @param Receivere $receivere
     * @throws AuthorizationException
     * @return void
     */
    public function show(Receivere $receivere)
    {
        $this->authorize('admin.receivere.show', $receivere);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Receivere $receivere
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Receivere $receivere)
    {
        $this->authorize('admin.receivere.edit', $receivere);


        return view('admin.receivere.edit', [
            'receivere' => $receivere,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReceivere $request
     * @param Receivere $receivere
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReceivere $request, Receivere $receivere)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Receivere
        $receivere->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/receiveres'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/receiveres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReceivere $request
     * @param Receivere $receivere
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReceivere $request, Receivere $receivere)
    {
        $receivere->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReceivere $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReceivere $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Receivere::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(ReceiveresExport::class), 'receiveres.xlsx');
    }
}
