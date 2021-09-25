<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Wallet\BulkDestroyWallet;
use App\Http\Requests\Admin\Wallet\DestroyWallet;
use App\Http\Requests\Admin\Wallet\IndexWallet;
use App\Http\Requests\Admin\Wallet\StoreWallet;
use App\Http\Requests\Admin\Wallet\UpdateWallet;
use App\Models\Wallet;
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

class WalletsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWallet $request
     * @return array|Factory|View
     */
    public function index(IndexWallet $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Wallet::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'money', 'belongs_to_type', 'belongs_to_id'],

            // set columns to searchIn
            ['id', 'belongs_to_type']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.wallet.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.wallet.create');

        return view('admin.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWallet $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWallet $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Wallet
        $wallet = Wallet::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/wallets'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/wallets');
    }

    /**
     * Display the specified resource.
     *
     * @param Wallet $wallet
     * @throws AuthorizationException
     * @return void
     */
    public function show(Wallet $wallet)
    {
        $this->authorize('admin.wallet.show', $wallet);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Wallet $wallet
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Wallet $wallet)
    {
        $this->authorize('admin.wallet.edit', $wallet);


        return view('admin.wallet.edit', [
            'wallet' => $wallet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWallet $request
     * @param Wallet $wallet
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWallet $request, Wallet $wallet)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Wallet
        $wallet->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/wallets'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/wallets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWallet $request
     * @param Wallet $wallet
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWallet $request, Wallet $wallet)
    {
        $wallet->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWallet $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWallet $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Wallet::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
