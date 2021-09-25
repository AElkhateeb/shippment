<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentMethod\BulkDestroyPaymentMethod;
use App\Http\Requests\Admin\PaymentMethod\DestroyPaymentMethod;
use App\Http\Requests\Admin\PaymentMethod\IndexPaymentMethod;
use App\Http\Requests\Admin\PaymentMethod\StorePaymentMethod;
use App\Http\Requests\Admin\PaymentMethod\UpdatePaymentMethod;
use App\Models\PaymentMethod;
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

class PaymentMethodsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPaymentMethod $request
     * @return array|Factory|View
     */
    public function index(IndexPaymentMethod $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PaymentMethod::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'fees', 'sale', 'enabled'],

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

        return view('admin.payment-method.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.payment-method.create');

        return view('admin.payment-method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePaymentMethod $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePaymentMethod $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PaymentMethod
        $paymentMethod = PaymentMethod::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/payment-methods'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/payment-methods');
    }

    /**
     * Display the specified resource.
     *
     * @param PaymentMethod $paymentMethod
     * @throws AuthorizationException
     * @return void
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $this->authorize('admin.payment-method.show', $paymentMethod);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PaymentMethod $paymentMethod
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $this->authorize('admin.payment-method.edit', $paymentMethod);


        return view('admin.payment-method.edit', [
            'paymentMethod' => $paymentMethod,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePaymentMethod $request
     * @param PaymentMethod $paymentMethod
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePaymentMethod $request, PaymentMethod $paymentMethod)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PaymentMethod
        $paymentMethod->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/payment-methods'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/payment-methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPaymentMethod $request
     * @param PaymentMethod $paymentMethod
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPaymentMethod $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPaymentMethod $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPaymentMethod $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PaymentMethod::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
