<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\BulkDestroyTestimonial;
use App\Http\Requests\Admin\Testimonial\DestroyTestimonial;
use App\Http\Requests\Admin\Testimonial\IndexTestimonial;
use App\Http\Requests\Admin\Testimonial\StoreTestimonial;
use App\Http\Requests\Admin\Testimonial\UpdateTestimonial;
use App\Models\Testimonial;
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

class TestimonialsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTestimonial $request
     * @return array|Factory|View
     */
    public function index(IndexTestimonial $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Testimonial::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'job', 'text', 'is_published'],

            // set columns to searchIn
            ['id', 'title', 'job', 'text']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.testimonial.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.testimonial.create');

        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTestimonial $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTestimonial $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Testimonial
        $testimonial = Testimonial::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/testimonials'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/testimonials');
    }

    /**
     * Display the specified resource.
     *
     * @param Testimonial $testimonial
     * @throws AuthorizationException
     * @return void
     */
    public function show(Testimonial $testimonial)
    {
        $this->authorize('admin.testimonial.show', $testimonial);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimonial $testimonial
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Testimonial $testimonial)
    {
        $this->authorize('admin.testimonial.edit', $testimonial);


        return view('admin.testimonial.edit', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTestimonial $request
     * @param Testimonial $testimonial
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTestimonial $request, Testimonial $testimonial)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Testimonial
        $testimonial->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/testimonials'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/testimonials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTestimonial $request
     * @param Testimonial $testimonial
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTestimonial $request, Testimonial $testimonial)
    {
        $testimonial->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTestimonial $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTestimonial $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Testimonial::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
