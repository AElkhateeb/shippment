<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReceiversExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Receiver\BulkDestroyReceiver;
use App\Http\Requests\Admin\Receiver\DestroyReceiver;
use App\Http\Requests\Admin\Receiver\IndexReceiver;
use App\Http\Requests\Admin\Receiver\StoreReceiver;
use App\Http\Requests\Admin\Receiver\UpdateReceiver;
use App\Models\Receiver;
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

class ReceiversController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexReceiver $request
     * @return array|Factory|View
     */
    public function index(IndexReceiver $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Receiver::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'fullname', 'address', 'phone', 'phone_2', 'city', 'area', 'location', 'lng', 'lat', 'governorate'],

            // set columns to searchIn
            ['id', 'fullname', 'address', 'phone', 'phone_2', 'city', 'area', 'location', 'governorate']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.receiver.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.receiver.create');

        return view('admin.receiver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReceiver $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreReceiver $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Receiver
        $receiver = Receiver::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/receivers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/receivers');
    }

    /**
     * Display the specified resource.
     *
     * @param Receiver $receiver
     * @throws AuthorizationException
     * @return void
     */
    public function show(Receiver $receiver)
    {
        $this->authorize('admin.receiver.show', $receiver);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Receiver $receiver
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Receiver $receiver)
    {
        $this->authorize('admin.receiver.edit', $receiver);


        return view('admin.receiver.edit', [
            'receiver' => $receiver,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReceiver $request
     * @param Receiver $receiver
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateReceiver $request, Receiver $receiver)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Receiver
        $receiver->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/receivers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/receivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyReceiver $request
     * @param Receiver $receiver
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyReceiver $request, Receiver $receiver)
    {
        $receiver->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyReceiver $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyReceiver $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Receiver::whereIn('id', $bulkChunk)->delete();

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
        return Excel::download(app(ReceiversExport::class), 'receivers.xlsx');
    }
}
