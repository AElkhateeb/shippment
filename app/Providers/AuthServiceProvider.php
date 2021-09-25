<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
       /* Gate::define('seo', function ($user) { return true; });
        //

       Gate::after(function ($user, $ability) {
            return $user->hasRole('seo') ? true : null;
        });
        */

        Gate::define('seo.translation.index', function ($user) { return true; });
        Gate::define('seo.translation.edit', function ($user) { return true; });
        Gate::define('seo.translation.rescan', function ($user) { return true; });

        Gate::define('seo.admin-user.index', function ($user) { return true; });
        Gate::define('seo.admin-user.create', function ($user) { return true; });
        Gate::define('seo.admin-user.edit', function ($user) { return true; });
        Gate::define('seo.admin-user.delete', function ($user) { return true; });
        Gate::define('seo.upload', function ($user) { return true; });
        Gate::define('seo.view', function ($user) { return true; });
        Gate::define('seo.admin-user.impersonal-login', function ($user) { return true; });

        Gate::define('seo.slider', function ($user) { return true; });
        Gate::define('seo.slider.index', function ($user) { return true; });
        Gate::define('seo.slider.create', function ($user) { return true; });
        Gate::define('seo.slider.show', function ($user) { return true; });
        Gate::define('seo.slider.edit', function ($user) { return true; });
        Gate::define('seo.slider.delete', function ($user) { return true; });
        Gate::define('seo.slider.bulk-delete', function ($user) { return true; });

        Gate::define('seo.identity', function ($user) { return true; });
        Gate::define('seo.identity.index', function ($user) { return true; });
        Gate::define('seo.identity.create', function ($user) { return true; });
        Gate::define('seo.identity.show', function ($user) { return true; });
        Gate::define('seo.identity.edit', function ($user) { return true; });
        Gate::define('seo.identity.delete', function ($user) { return true; });
        Gate::define('seo.identity.bulk-delete', function ($user) { return true; });

        Gate::define('seo.pro', function ($user) { return true; });
        Gate::define('seo.pro.index', function ($user) { return true; });
        Gate::define('seo.pro.create', function ($user) { return true; });
        Gate::define('seo.pro.show', function ($user) { return true; });
        Gate::define('seo.pro.edit', function ($user) { return true; });
        Gate::define('seo.pro.delete', function ($user) { return true; });
        Gate::define('seo.pro.bulk-delete', function ($user) { return true; });

        Gate::define('seo.service', function ($user) { return true; });
        Gate::define('seo.service.index', function ($user) { return true; });
        Gate::define('seo.service.create', function ($user) { return true; });
        Gate::define('seo.service.show', function ($user) { return true; });
        Gate::define('seo.service.edit', function ($user) { return true; });
        Gate::define('seo.service.delete', function ($user) { return true; });
        Gate::define('seo.service.bulk-delete', function ($user) { return true; });

        Gate::define('seo.job', function ($user) { return true; });
        Gate::define('seo.job.index', function ($user) { return true; });
        Gate::define('seo.job.create', function ($user) { return true; });
        Gate::define('seo.job.show', function ($user) { return true; });
        Gate::define('seo.job.edit', function ($user) { return true; });
        Gate::define('seo.job.delete', function ($user) { return true; });
        Gate::define('seo.job.bulk-delete', function ($user) { return true; });

        Gate::define('seo.application', function ($user) { return true; });
        Gate::define('seo.application.index', function ($user) { return true; });
        Gate::define('seo.application.create', function ($user) { return true; });
        Gate::define('seo.application.show', function ($user) { return true; });
        Gate::define('seo.application.edit', function ($user) { return true; });
        Gate::define('seo.application.delete', function ($user) { return true; });
        Gate::define('seo.application.bulk-delete', function ($user) { return true; });

        Gate::define('seo.testimonial', function ($user) { return true; });
        Gate::define('seo.testimonial.index', function ($user) { return true; });
        Gate::define('seo.testimonial.create', function ($user) { return true; });
        Gate::define('seo.testimonial.show', function ($user) { return true; });
        Gate::define('seo.testimonial.edit', function ($user) { return true; });
        Gate::define('seo.testimonial.delete', function ($user) { return true; });
        Gate::define('seo.testimonial.bulk-delete', function ($user) { return true; });

        Gate::define('seo.social', function ($user) { return true; });
        Gate::define('seo.social.index', function ($user) { return true; });
        Gate::define('seo.social.create', function ($user) { return true; });
        Gate::define('seo.social.show', function ($user) { return true; });
        Gate::define('seo.social.edit', function ($user) { return true; });
        Gate::define('seo.social.delete', function ($user) { return true; });
        Gate::define('seo.social.bulk-delete', function ($user) { return true; });


        Gate::define('seo.page', function ($user) { return true; });
        Gate::define('seo.page.index', function ($user) { return true; });
        Gate::define('seo.page.create', function ($user) { return true; });
        Gate::define('seo.page.show', function ($user) { return true; });
        Gate::define('seo.page.edit', function ($user) { return true; });
        Gate::define('seo.page.delete', function ($user) { return true; });
        Gate::define('seo.page.bulk-delete', function ($user) { return true; });

        Gate::define('seo.contact', function ($user) { return true; });
        Gate::define('seo.contact.index', function ($user) { return true; });
        Gate::define('seo.contact.create', function ($user) { return true; });
        Gate::define('seo.contact.show', function ($user) { return true; });
        Gate::define('seo.contact.edit', function ($user) { return true; });
        Gate::define('seo.contact.delete', function ($user) { return true; });
        Gate::define('seo.contact.bulk-delete', function ($user) { return true; });

        Gate::define('seo.client', function ($user) { return true; });
        Gate::define('seo.client.index', function ($user) { return true; });
        Gate::define('seo.client.create', function ($user) { return true; });
        Gate::define('seo.client.show', function ($user) { return true; });
        Gate::define('seo.client.edit', function ($user) { return true; });
        Gate::define('seo.client.delete', function ($user) { return true; });
        Gate::define('seo.client.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.translation.index', function ($user) { return true; });
        Gate::define('ceo.translation.edit', function ($user) { return true; });
        Gate::define('ceo.translation.rescan', function ($user) { return true; });

        Gate::define('ceo.manger-admin.index', function ($user) { return true; });
        Gate::define('ceo.manger-admin.show', function ($user) { return true; });
        Gate::define('ceo.manger-admin.create', function ($user) { return true; });
        Gate::define('ceo.manger-admin.edit', function ($user) { return true; });
        Gate::define('ceo.manger-admin.delete', function ($user) { return true; });
        Gate::define('ceo.manger-admin.impersonal-login', function ($user) { return true; });

        Gate::define('ceo.employee-admin.index', function ($user) { return true; });
        Gate::define('ceo.employee-admin.show', function ($user) { return true; });
        Gate::define('ceo.employee-admin.create', function ($user) { return true; });
        Gate::define('ceo.employee-admin.edit', function ($user) { return true; });
        Gate::define('ceo.employee-admin.delete', function ($user) { return true; });
        Gate::define('ceo.employee-admin.impersonal-login', function ($user) { return true; });

        Gate::define('ceo.seo-admin.index', function ($user) { return true; });
        Gate::define('ceo.seo-admin.show', function ($user) { return true; });
        Gate::define('ceo.seo-admin.create', function ($user) { return true; });
        Gate::define('ceo.seo-admin.edit', function ($user) { return true; });
        Gate::define('ceo.seo-admin.delete', function ($user) { return true; });
        Gate::define('ceo.seo-admin.impersonal-login', function ($user) { return true; });

        Gate::define('ceo.shipper-admin.index', function ($user) { return true; });
        Gate::define('ceo.shipper-admin.show', function ($user) { return true; });
        Gate::define('ceo.shipper-admin.create', function ($user) { return true; });
        Gate::define('ceo.shipper-admin.edit', function ($user) { return true; });
        Gate::define('ceo.shipper-admin.delete', function ($user) { return true; });
        Gate::define('ceo.shipper-admin.impersonal-login', function ($user) { return true; });

        Gate::define('ceo.account-admin.index', function ($user) { return true; });
        Gate::define('ceo.account-admin.show', function ($user) { return true; });
        Gate::define('ceo.account-admin.create', function ($user) { return true; });
        Gate::define('ceo.account-admin.edit', function ($user) { return true; });
        Gate::define('ceo.account-admin.delete', function ($user) { return true; });
        Gate::define('ceo.account-admin.impersonal-login', function ($user) { return true; });


        Gate::define('ceo.upload', function ($user) { return true; });

        Gate::define('ceo.slider', function ($user) { return true; });
        Gate::define('ceo.slider.index', function ($user) { return true; });
        Gate::define('ceo.slider.create', function ($user) { return true; });
        Gate::define('ceo.slider.show', function ($user) { return true; });
        Gate::define('ceo.slider.edit', function ($user) { return true; });
        Gate::define('ceo.slider.delete', function ($user) { return true; });
        Gate::define('ceo.slider.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.identity', function ($user) { return true; });
        Gate::define('ceo.identity.index', function ($user) { return true; });
        Gate::define('ceo.identity.create', function ($user) { return true; });
        Gate::define('ceo.identity.show', function ($user) { return true; });
        Gate::define('ceo.identity.edit', function ($user) { return true; });
        Gate::define('ceo.identity.delete', function ($user) { return true; });
        Gate::define('ceo.identity.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.pro', function ($user) { return true; });
        Gate::define('ceo.pro.index', function ($user) { return true; });
        Gate::define('ceo.pro.create', function ($user) { return true; });
        Gate::define('ceo.pro.show', function ($user) { return true; });
        Gate::define('ceo.pro.edit', function ($user) { return true; });
        Gate::define('ceo.pro.delete', function ($user) { return true; });
        Gate::define('ceo.pro.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.service', function ($user) { return true; });
        Gate::define('ceo.service.index', function ($user) { return true; });
        Gate::define('ceo.service.create', function ($user) { return true; });
        Gate::define('ceo.service.show', function ($user) { return true; });
        Gate::define('ceo.service.edit', function ($user) { return true; });
        Gate::define('ceo.service.delete', function ($user) { return true; });
        Gate::define('ceo.service.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.job', function ($user) { return true; });
        Gate::define('ceo.job.index', function ($user) { return true; });
        Gate::define('ceo.job.create', function ($user) { return true; });
        Gate::define('ceo.job.show', function ($user) { return true; });
        Gate::define('ceo.job.edit', function ($user) { return true; });
        Gate::define('ceo.job.delete', function ($user) { return true; });
        Gate::define('ceo.job.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.application', function ($user) { return true; });
        Gate::define('ceo.application.index', function ($user) { return true; });
        Gate::define('ceo.application.create', function ($user) { return true; });
        Gate::define('ceo.application.show', function ($user) { return true; });
        Gate::define('ceo.application.edit', function ($user) { return true; });
        Gate::define('ceo.application.delete', function ($user) { return true; });
        Gate::define('ceo.application.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.testimonial', function ($user) { return true; });
        Gate::define('ceo.testimonial.index', function ($user) { return true; });
        Gate::define('ceo.testimonial.create', function ($user) { return true; });
        Gate::define('ceo.testimonial.show', function ($user) { return true; });
        Gate::define('ceo.testimonial.edit', function ($user) { return true; });
        Gate::define('ceo.testimonial.delete', function ($user) { return true; });
        Gate::define('ceo.testimonial.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.social', function ($user) { return true; });
        Gate::define('ceo.social.index', function ($user) { return true; });
        Gate::define('ceo.social.create', function ($user) { return true; });
        Gate::define('ceo.social.show', function ($user) { return true; });
        Gate::define('ceo.social.edit', function ($user) { return true; });
        Gate::define('ceo.social.delete', function ($user) { return true; });
        Gate::define('ceo.social.bulk-delete', function ($user) { return true; });


        Gate::define('ceo.page', function ($user) { return true; });
        Gate::define('ceo.page.index', function ($user) { return true; });
        Gate::define('ceo.page.create', function ($user) { return true; });
        Gate::define('ceo.page.show', function ($user) { return true; });
        Gate::define('ceo.page.edit', function ($user) { return true; });
        Gate::define('ceo.page.delete', function ($user) { return true; });
        Gate::define('ceo.page.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.contact', function ($user) { return true; });
        Gate::define('ceo.contact.index', function ($user) { return true; });
        Gate::define('ceo.contact.create', function ($user) { return true; });
        Gate::define('ceo.contact.show', function ($user) { return true; });
        Gate::define('ceo.contact.edit', function ($user) { return true; });
        Gate::define('ceo.contact.delete', function ($user) { return true; });
        Gate::define('ceo.contact.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.client', function ($user) { return true; });
        Gate::define('ceo.client.index', function ($user) { return true; });
        Gate::define('ceo.client.create', function ($user) { return true; });
        Gate::define('ceo.client.show', function ($user) { return true; });
        Gate::define('ceo.client.edit', function ($user) { return true; });
        Gate::define('ceo.client.delete', function ($user) { return true; });
        Gate::define('ceo.client.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.shipment', function ($user) { return true; });
        Gate::define('ceo.shipment.index', function ($user) { return true; });
        Gate::define('ceo.shipment.create', function ($user) { return true; });
        Gate::define('ceo.shipment.show', function ($user) { return true; });
        Gate::define('ceo.shipment.edit', function ($user) { return true; });
        Gate::define('ceo.shipment.delete', function ($user) { return true; });
        Gate::define('ceo.shipment.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.place', function ($user) { return true; });
        Gate::define('ceo.place.index', function ($user) { return true; });
        Gate::define('ceo.place.create', function ($user) { return true; });
        Gate::define('ceo.place.show', function ($user) { return true; });
        Gate::define('ceo.place.edit', function ($user) { return true; });
        Gate::define('ceo.place.delete', function ($user) { return true; });
        Gate::define('ceo.place.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.road', function ($user) { return true; });
        Gate::define('ceo.road.index', function ($user) { return true; });
        Gate::define('ceo.road.create', function ($user) { return true; });
        Gate::define('ceo.road.show', function ($user) { return true; });
        Gate::define('ceo.road.edit', function ($user) { return true; });
        Gate::define('ceo.road.delete', function ($user) { return true; });
        Gate::define('ceo.road.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.payment-method', function ($user) { return true; });
        Gate::define('ceo.payment-method.index', function ($user) { return true; });
        Gate::define('ceo.payment-method.create', function ($user) { return true; });
        Gate::define('ceo.payment-method.show', function ($user) { return true; });
        Gate::define('ceo.payment-method.edit', function ($user) { return true; });
        Gate::define('ceo.payment-method.delete', function ($user) { return true; });
        Gate::define('ceo.payment-method.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.wallet', function ($user) { return true; });
        Gate::define('ceo.wallet.index', function ($user) { return true; });
        Gate::define('ceo.wallet.create', function ($user) { return true; });
        Gate::define('ceo.wallet.show', function ($user) { return true; });
        Gate::define('ceo.wallet.edit', function ($user) { return true; });
        Gate::define('ceo.wallet.delete', function ($user) { return true; });
        Gate::define('ceo.wallet.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.withdrawal', function ($user) { return true; });
        Gate::define('ceo.withdrawal.index', function ($user) { return true; });
        Gate::define('ceo.withdrawal.create', function ($user) { return true; });
        Gate::define('ceo.withdrawal.show', function ($user) { return true; });
        Gate::define('ceo.withdrawal.edit', function ($user) { return true; });
        Gate::define('ceo.withdrawal.delete', function ($user) { return true; });
        Gate::define('ceo.withdrawal.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.branch', function ($user) { return true; });
        Gate::define('ceo.branch.index', function ($user) { return true; });
        Gate::define('ceo.branch.create', function ($user) { return true; });
        Gate::define('ceo.branch.show', function ($user) { return true; });
        Gate::define('ceo.branch.edit', function ($user) { return true; });
        Gate::define('ceo.branch.delete', function ($user) { return true; });
        Gate::define('ceo.branch.bulk-delete', function ($user) { return true; });

        Gate::define('ceo.receivere', function ($user) { return true; });
        Gate::define('ceo.receivere.index', function ($user) { return true; });
        Gate::define('ceo.receivere.create', function ($user) { return true; });
        Gate::define('ceo.receivere.show', function ($user) { return true; });
        Gate::define('ceo.receivere.edit', function ($user) { return true; });
        Gate::define('ceo.receivere.delete', function ($user) { return true; });
        Gate::define('ceo.receivere.bulk-delete', function ($user) { return true; });


        Gate::define('manger.translation.index', function ($user) { return true; });
        Gate::define('manger.translation.edit', function ($user) { return true; });
        Gate::define('manger.translation.rescan', function ($user) { return true; });

        Gate::define('manger.employee-admin.index', function ($user) { return true; });
        Gate::define('manger.employee-admin.show', function ($user) { return true; });
        Gate::define('manger.employee-admin.create', function ($user) { return true; });
        Gate::define('manger.employee-admin.edit', function ($user) { return true; });
        Gate::define('manger.employee-admin.delete', function ($user) { return true; });
        Gate::define('manger.employee-admin.impersonal-login', function ($user) { return true; });

        Gate::define('manger.seo-admin.index', function ($user) { return true; });
        Gate::define('manger.seo-admin.show', function ($user) { return true; });
        Gate::define('manger.seo-admin.create', function ($user) { return true; });
        Gate::define('manger.seo-admin.edit', function ($user) { return true; });
        Gate::define('manger.seo-admin.delete', function ($user) { return true; });
        Gate::define('manger.seo-admin.impersonal-login', function ($user) { return true; });

        Gate::define('manger.shipper-admin.index', function ($user) { return true; });
        Gate::define('manger.shipper-admin.show', function ($user) { return true; });
        Gate::define('manger.shipper-admin.create', function ($user) { return true; });
        Gate::define('manger.shipper-admin.edit', function ($user) { return true; });
        Gate::define('manger.shipper-admin.delete', function ($user) { return true; });
        Gate::define('manger.shipper-admin.impersonal-login', function ($user) { return true; });

        Gate::define('manger.account-admin.index', function ($user) { return true; });
        Gate::define('manger.account-admin.show', function ($user) { return true; });
        Gate::define('manger.account-admin.create', function ($user) { return true; });
        Gate::define('manger.account-admin.edit', function ($user) { return true; });
        Gate::define('manger.account-admin.delete', function ($user) { return true; });
        Gate::define('manger.account-admin.impersonal-login', function ($user) { return true; });


        Gate::define('manger.upload', function ($user) { return true; });

        Gate::define('manger.slider', function ($user) { return true; });
        Gate::define('manger.slider.index', function ($user) { return true; });
        Gate::define('manger.slider.create', function ($user) { return true; });
        Gate::define('manger.slider.show', function ($user) { return true; });
        Gate::define('manger.slider.edit', function ($user) { return true; });
        Gate::define('manger.slider.delete', function ($user) { return true; });
        Gate::define('manger.slider.bulk-delete', function ($user) { return true; });

        Gate::define('manger.identity', function ($user) { return true; });
        Gate::define('manger.identity.index', function ($user) { return true; });
        Gate::define('manger.identity.create', function ($user) { return true; });
        Gate::define('manger.identity.show', function ($user) { return true; });
        Gate::define('manger.identity.edit', function ($user) { return true; });
        Gate::define('manger.identity.delete', function ($user) { return true; });
        Gate::define('manger.identity.bulk-delete', function ($user) { return true; });

        Gate::define('manger.pro', function ($user) { return true; });
        Gate::define('manger.pro.index', function ($user) { return true; });
        Gate::define('manger.pro.create', function ($user) { return true; });
        Gate::define('manger.pro.show', function ($user) { return true; });
        Gate::define('manger.pro.edit', function ($user) { return true; });
        Gate::define('manger.pro.delete', function ($user) { return true; });
        Gate::define('manger.pro.bulk-delete', function ($user) { return true; });

        Gate::define('manger.service', function ($user) { return true; });
        Gate::define('manger.service.index', function ($user) { return true; });
        Gate::define('manger.service.create', function ($user) { return true; });
        Gate::define('manger.service.show', function ($user) { return true; });
        Gate::define('manger.service.edit', function ($user) { return true; });
        Gate::define('manger.service.delete', function ($user) { return true; });
        Gate::define('manger.service.bulk-delete', function ($user) { return true; });

        Gate::define('manger.job', function ($user) { return true; });
        Gate::define('manger.job.index', function ($user) { return true; });
        Gate::define('manger.job.create', function ($user) { return true; });
        Gate::define('manger.job.show', function ($user) { return true; });
        Gate::define('manger.job.edit', function ($user) { return true; });
        Gate::define('manger.job.delete', function ($user) { return true; });
        Gate::define('manger.job.bulk-delete', function ($user) { return true; });

        Gate::define('manger.application', function ($user) { return true; });
        Gate::define('manger.application.index', function ($user) { return true; });
        Gate::define('manger.application.create', function ($user) { return true; });
        Gate::define('manger.application.show', function ($user) { return true; });
        Gate::define('manger.application.edit', function ($user) { return true; });
        Gate::define('manger.application.delete', function ($user) { return true; });
        Gate::define('manger.application.bulk-delete', function ($user) { return true; });

        Gate::define('manger.testimonial', function ($user) { return true; });
        Gate::define('manger.testimonial.index', function ($user) { return true; });
        Gate::define('manger.testimonial.create', function ($user) { return true; });
        Gate::define('manger.testimonial.show', function ($user) { return true; });
        Gate::define('manger.testimonial.edit', function ($user) { return true; });
        Gate::define('manger.testimonial.delete', function ($user) { return true; });
        Gate::define('manger.testimonial.bulk-delete', function ($user) { return true; });

        Gate::define('manger.social', function ($user) { return true; });
        Gate::define('manger.social.index', function ($user) { return true; });
        Gate::define('manger.social.create', function ($user) { return true; });
        Gate::define('manger.social.show', function ($user) { return true; });
        Gate::define('manger.social.edit', function ($user) { return true; });
        Gate::define('manger.social.delete', function ($user) { return true; });
        Gate::define('manger.social.bulk-delete', function ($user) { return true; });


        Gate::define('manger.page', function ($user) { return true; });
        Gate::define('manger.page.index', function ($user) { return true; });
        Gate::define('manger.page.create', function ($user) { return true; });
        Gate::define('manger.page.show', function ($user) { return true; });
        Gate::define('manger.page.edit', function ($user) { return true; });
        Gate::define('manger.page.delete', function ($user) { return true; });
        Gate::define('manger.page.bulk-delete', function ($user) { return true; });

        Gate::define('manger.contact', function ($user) { return true; });
        Gate::define('manger.contact.index', function ($user) { return true; });
        Gate::define('manger.contact.create', function ($user) { return true; });
        Gate::define('manger.contact.show', function ($user) { return true; });
        Gate::define('manger.contact.edit', function ($user) { return true; });
        Gate::define('manger.contact.delete', function ($user) { return true; });
        Gate::define('manger.contact.bulk-delete', function ($user) { return true; });

        Gate::define('manger.client', function ($user) { return true; });
        Gate::define('manger.client.index', function ($user) { return true; });
        Gate::define('manger.client.create', function ($user) { return true; });
        Gate::define('manger.client.show', function ($user) { return true; });
        Gate::define('manger.client.edit', function ($user) { return true; });
        Gate::define('manger.client.delete', function ($user) { return true; });
        Gate::define('manger.client.bulk-delete', function ($user) { return true; });

        Gate::define('manger.shipment', function ($user) { return true; });
        Gate::define('manger.shipment.index', function ($user) { return true; });
        Gate::define('manger.shipment.create', function ($user) { return true; });
        Gate::define('manger.shipment.show', function ($user) { return true; });
        Gate::define('manger.shipment.edit', function ($user) { return true; });
        Gate::define('manger.shipment.delete', function ($user) { return true; });
        Gate::define('manger.shipment.bulk-delete', function ($user) { return true; });

        Gate::define('manger.place', function ($user) { return true; });
        Gate::define('manger.place.index', function ($user) { return true; });
        Gate::define('manger.place.create', function ($user) { return true; });
        Gate::define('manger.place.show', function ($user) { return true; });
        Gate::define('manger.place.edit', function ($user) { return true; });
        Gate::define('manger.place.delete', function ($user) { return true; });
        Gate::define('manger.place.bulk-delete', function ($user) { return true; });

        Gate::define('manger.road', function ($user) { return true; });
        Gate::define('manger.road.index', function ($user) { return true; });
        Gate::define('manger.road.create', function ($user) { return true; });
        Gate::define('manger.road.show', function ($user) { return true; });
        Gate::define('manger.road.edit', function ($user) { return true; });
        Gate::define('manger.road.delete', function ($user) { return true; });
        Gate::define('manger.road.bulk-delete', function ($user) { return true; });

        Gate::define('manger.payment-method', function ($user) { return true; });
        Gate::define('manger.payment-method.index', function ($user) { return true; });
        Gate::define('manger.payment-method.create', function ($user) { return true; });
        Gate::define('manger.payment-method.show', function ($user) { return true; });
        Gate::define('manger.payment-method.edit', function ($user) { return true; });
        Gate::define('manger.payment-method.delete', function ($user) { return true; });
        Gate::define('manger.payment-method.bulk-delete', function ($user) { return true; });

        Gate::define('manger.wallet', function ($user) { return true; });
        Gate::define('manger.wallet.index', function ($user) { return true; });
        Gate::define('manger.wallet.create', function ($user) { return true; });
        Gate::define('manger.wallet.show', function ($user) { return true; });
        Gate::define('manger.wallet.edit', function ($user) { return true; });
        Gate::define('manger.wallet.delete', function ($user) { return true; });
        Gate::define('manger.wallet.bulk-delete', function ($user) { return true; });

        Gate::define('manger.withdrawal', function ($user) { return true; });
        Gate::define('manger.withdrawal.index', function ($user) { return true; });
        Gate::define('manger.withdrawal.create', function ($user) { return true; });
        Gate::define('manger.withdrawal.show', function ($user) { return true; });
        Gate::define('manger.withdrawal.edit', function ($user) { return true; });
        Gate::define('manger.withdrawal.delete', function ($user) { return true; });
        Gate::define('manger.withdrawal.bulk-delete', function ($user) { return true; });

        Gate::define('manger.branch', function ($user) { return true; });
        Gate::define('manger.branch.index', function ($user) { return true; });
        Gate::define('manger.branch.create', function ($user) { return true; });
        Gate::define('manger.branch.show', function ($user) { return true; });
        Gate::define('manger.branch.edit', function ($user) { return true; });
        Gate::define('manger.branch.delete', function ($user) { return true; });
        Gate::define('manger.branch.bulk-delete', function ($user) { return true; });

        Gate::define('manger.receivere', function ($user) { return true; });
        Gate::define('manger.receivere.index', function ($user) { return true; });
        Gate::define('manger.receivere.create', function ($user) { return true; });
        Gate::define('manger.receivere.show', function ($user) { return true; });
        Gate::define('manger.receivere.edit', function ($user) { return true; });
        Gate::define('manger.receivere.delete', function ($user) { return true; });
        Gate::define('manger.receivere.bulk-delete', function ($user) { return true; });


        Gate::define('employee.translation.index', function ($user) { return true; });
        Gate::define('employee.translation.edit', function ($user) { return true; });
        Gate::define('employee.translation.rescan', function ($user) { return true; });


        Gate::define('employee.shipper-admin.index', function ($user) { return true; });
        Gate::define('employee.shipper-admin.show', function ($user) { return true; });
        Gate::define('employee.shipper-admin.create', function ($user) { return true; });
        Gate::define('employee.shipper-admin.edit', function ($user) { return true; });
        Gate::define('employee.shipper-admin.delete', function ($user) { return true; });
        Gate::define('employee.shipper-admin.impersonal-login', function ($user) { return true; });

        Gate::define('employee.account-admin.index', function ($user) { return true; });
        Gate::define('employee.account-admin.show', function ($user) { return true; });
        Gate::define('employee.account-admin.create', function ($user) { return true; });
        Gate::define('employee.account-admin.edit', function ($user) { return true; });
        Gate::define('employee.account-admin.delete', function ($user) { return true; });
        Gate::define('employee.account-admin.impersonal-login', function ($user) { return true; });


        Gate::define('employee.upload', function ($user) { return true; });

        Gate::define('employee.job', function ($user) { return true; });
        Gate::define('employee.job.index', function ($user) { return true; });
        Gate::define('employee.job.create', function ($user) { return true; });
        Gate::define('employee.job.show', function ($user) { return true; });
        Gate::define('employee.job.edit', function ($user) { return true; });
        Gate::define('employee.job.delete', function ($user) { return true; });
        Gate::define('employee.job.bulk-delete', function ($user) { return true; });

        Gate::define('employee.application', function ($user) { return true; });
        Gate::define('employee.application.index', function ($user) { return true; });
        Gate::define('employee.application.create', function ($user) { return true; });
        Gate::define('employee.application.show', function ($user) { return true; });
        Gate::define('employee.application.edit', function ($user) { return true; });
        Gate::define('employee.application.delete', function ($user) { return true; });
        Gate::define('employee.application.bulk-delete', function ($user) { return true; });

        Gate::define('employee.testimonial', function ($user) { return true; });
        Gate::define('employee.testimonial.index', function ($user) { return true; });
        Gate::define('employee.testimonial.create', function ($user) { return true; });
        Gate::define('employee.testimonial.show', function ($user) { return true; });
        Gate::define('employee.testimonial.edit', function ($user) { return true; });
        Gate::define('employee.testimonial.delete', function ($user) { return true; });
        Gate::define('employee.testimonial.bulk-delete', function ($user) { return true; });

        Gate::define('employee.client', function ($user) { return true; });
        Gate::define('employee.client.index', function ($user) { return true; });
        Gate::define('employee.client.create', function ($user) { return true; });
        Gate::define('employee.client.show', function ($user) { return true; });
        Gate::define('employee.client.edit', function ($user) { return true; });
        Gate::define('employee.client.delete', function ($user) { return true; });
        Gate::define('employee.client.bulk-delete', function ($user) { return true; });

        Gate::define('employee.shipment', function ($user) { return true; });
        Gate::define('employee.shipment.index', function ($user) { return true; });
        Gate::define('employee.shipment.create', function ($user) { return true; });
        Gate::define('employee.shipment.show', function ($user) { return true; });
        Gate::define('employee.shipment.edit', function ($user) { return true; });
        Gate::define('employee.shipment.delete', function ($user) { return true; });
        Gate::define('employee.shipment.bulk-delete', function ($user) { return true; });

        Gate::define('employee.place', function ($user) { return true; });
        Gate::define('employee.place.index', function ($user) { return true; });
        Gate::define('employee.place.create', function ($user) { return true; });
        Gate::define('employee.place.show', function ($user) { return true; });
        Gate::define('employee.place.edit', function ($user) { return true; });
        Gate::define('employee.place.delete', function ($user) { return true; });
        Gate::define('employee.place.bulk-delete', function ($user) { return true; });

        Gate::define('employee.road', function ($user) { return true; });
        Gate::define('employee.road.index', function ($user) { return true; });
        Gate::define('employee.road.create', function ($user) { return true; });
        Gate::define('employee.road.show', function ($user) { return true; });
        Gate::define('employee.road.edit', function ($user) { return true; });
        Gate::define('employee.road.delete', function ($user) { return true; });
        Gate::define('employee.road.bulk-delete', function ($user) { return true; });

        Gate::define('employee.payment-method', function ($user) { return true; });
        Gate::define('employee.payment-method.index', function ($user) { return true; });
        Gate::define('employee.payment-method.create', function ($user) { return true; });
        Gate::define('employee.payment-method.show', function ($user) { return true; });
        Gate::define('employee.payment-method.edit', function ($user) { return true; });
        Gate::define('employee.payment-method.delete', function ($user) { return true; });
        Gate::define('employee.payment-method.bulk-delete', function ($user) { return true; });

        Gate::define('employee.wallet', function ($user) { return true; });
        Gate::define('employee.wallet.index', function ($user) { return true; });
        Gate::define('employee.wallet.create', function ($user) { return true; });
        Gate::define('employee.wallet.show', function ($user) { return true; });
        Gate::define('employee.wallet.edit', function ($user) { return true; });
        Gate::define('employee.wallet.delete', function ($user) { return true; });
        Gate::define('employee.wallet.bulk-delete', function ($user) { return true; });

        Gate::define('employee.withdrawal', function ($user) { return true; });
        Gate::define('employee.withdrawal.index', function ($user) { return true; });
        Gate::define('employee.withdrawal.create', function ($user) { return true; });
        Gate::define('employee.withdrawal.show', function ($user) { return true; });
        Gate::define('employee.withdrawal.edit', function ($user) { return true; });
        Gate::define('employee.withdrawal.delete', function ($user) { return true; });
        Gate::define('employee.withdrawal.bulk-delete', function ($user) { return true; });

        Gate::define('employee.receivere', function ($user) { return true; });
        Gate::define('employee.receivere.index', function ($user) { return true; });
        Gate::define('employee.receivere.create', function ($user) { return true; });
        Gate::define('employee.receivere.show', function ($user) { return true; });
        Gate::define('employee.receivere.edit', function ($user) { return true; });
        Gate::define('employee.receivere.delete', function ($user) { return true; });
        Gate::define('employee.receivere.bulk-delete', function ($user) { return true; });
        Gate::define('shipper.upload', function ($user) { return true; });

        Gate::define('shipper.shipment', function ($user) { return true; });
        Gate::define('shipper.shipment.index', function ($user) { return true; });
        Gate::define('shipper.shipment.create', function ($user) { return true; });
        Gate::define('shipper.shipment.show', function ($user) { return true; });
        Gate::define('shipper.shipment.edit', function ($user) { return true; });
        Gate::define('shipper.shipment.delete', function ($user) { return true; });
        Gate::define('shipper.shipment.bulk-delete', function ($user) { return true; });

        Gate::define('shipper.place', function ($user) { return true; });
        Gate::define('shipper.place.index', function ($user) { return true; });
        Gate::define('shipper.place.create', function ($user) { return true; });
        Gate::define('shipper.place.show', function ($user) { return true; });
        Gate::define('shipper.place.edit', function ($user) { return true; });
        Gate::define('shipper.place.delete', function ($user) { return true; });
        Gate::define('shipper.place.bulk-delete', function ($user) { return true; });

        Gate::define('shipper.road', function ($user) { return true; });
        Gate::define('shipper.road.index', function ($user) { return true; });
        Gate::define('shipper.road.create', function ($user) { return true; });
        Gate::define('shipper.road.show', function ($user) { return true; });
        Gate::define('shipper.road.edit', function ($user) { return true; });
        Gate::define('shipper.road.delete', function ($user) { return true; });
        Gate::define('shipper.road.bulk-delete', function ($user) { return true; });

        Gate::define('shipper.payment-method', function ($user) { return true; });
        Gate::define('shipper.payment-method.index', function ($user) { return true; });
        Gate::define('shipper.payment-method.create', function ($user) { return true; });
        Gate::define('shipper.payment-method.show', function ($user) { return true; });
        Gate::define('shipper.payment-method.edit', function ($user) { return true; });
        Gate::define('shipper.payment-method.delete', function ($user) { return true; });
        Gate::define('shipper.payment-method.bulk-delete', function ($user) { return true; });

        Gate::define('shipper.wallet', function ($user) { return true; });
        Gate::define('shipper.wallet.index', function ($user) { return true; });
        Gate::define('shipper.wallet.create', function ($user) { return true; });
        Gate::define('shipper.wallet.show', function ($user) { return true; });
        Gate::define('shipper.wallet.edit', function ($user) { return true; });
        Gate::define('shipper.wallet.delete', function ($user) { return true; });
        Gate::define('shipper.wallet.bulk-delete', function ($user) { return true; });

        Gate::define('shipper.withdrawal', function ($user) { return true; });
        Gate::define('shipper.withdrawal.index', function ($user) { return true; });
        Gate::define('shipper.withdrawal.create', function ($user) { return true; });
        Gate::define('shipper.withdrawal.show', function ($user) { return true; });
        Gate::define('shipper.withdrawal.edit', function ($user) { return true; });
        Gate::define('shipper.withdrawal.delete', function ($user) { return true; });
        Gate::define('shipper.withdrawal.bulk-delete', function ($user) { return true; });

        Gate::define('shipper.receivere', function ($user) { return true; });
        Gate::define('shipper.receivere.index', function ($user) { return true; });
        Gate::define('shipper.receivere.create', function ($user) { return true; });
        Gate::define('shipper.receivere.show', function ($user) { return true; });
        Gate::define('shipper.receivere.edit', function ($user) { return true; });
        Gate::define('shipper.receivere.delete', function ($user) { return true; });
        Gate::define('shipper.receivere.bulk-delete', function ($user) { return true; });


        Gate::define('account.upload', function ($user) { return true; });

        Gate::define('account.shipment', function ($user) { return true; });
        Gate::define('account.shipment.index', function ($user) { return true; });
        Gate::define('account.shipment.create', function ($user) { return true; });
        Gate::define('account.shipment.show', function ($user) { return true; });
        Gate::define('account.shipment.edit', function ($user) { return true; });
        Gate::define('account.shipment.delete', function ($user) { return true; });
        Gate::define('account.shipment.bulk-delete', function ($user) { return true; });

        Gate::define('account.place', function ($user) { return true; });
        Gate::define('account.place.index', function ($user) { return true; });
        Gate::define('account.place.create', function ($user) { return true; });
        Gate::define('account.place.show', function ($user) { return true; });
        Gate::define('account.place.edit', function ($user) { return true; });
        Gate::define('account.place.delete', function ($user) { return true; });
        Gate::define('account.place.bulk-delete', function ($user) { return true; });

        Gate::define('account.road', function ($user) { return true; });
        Gate::define('account.road.index', function ($user) { return true; });
        Gate::define('account.road.create', function ($user) { return true; });
        Gate::define('account.road.show', function ($user) { return true; });
        Gate::define('account.road.edit', function ($user) { return true; });
        Gate::define('account.road.delete', function ($user) { return true; });
        Gate::define('account.road.bulk-delete', function ($user) { return true; });

        Gate::define('account.payment-method', function ($user) { return true; });
        Gate::define('account.payment-method.index', function ($user) { return true; });
        Gate::define('account.payment-method.create', function ($user) { return true; });
        Gate::define('account.payment-method.show', function ($user) { return true; });
        Gate::define('account.payment-method.edit', function ($user) { return true; });
        Gate::define('account.payment-method.delete', function ($user) { return true; });
        Gate::define('account.payment-method.bulk-delete', function ($user) { return true; });

        Gate::define('account.wallet', function ($user) { return true; });
        Gate::define('account.wallet.index', function ($user) { return true; });
        Gate::define('account.wallet.create', function ($user) { return true; });
        Gate::define('account.wallet.show', function ($user) { return true; });
        Gate::define('account.wallet.edit', function ($user) { return true; });
        Gate::define('account.wallet.delete', function ($user) { return true; });
        Gate::define('account.wallet.bulk-delete', function ($user) { return true; });

        Gate::define('account.withdrawal', function ($user) { return true; });
        Gate::define('account.withdrawal.index', function ($user) { return true; });
        Gate::define('account.withdrawal.create', function ($user) { return true; });
        Gate::define('account.withdrawal.show', function ($user) { return true; });
        Gate::define('account.withdrawal.edit', function ($user) { return true; });
        Gate::define('account.withdrawal.delete', function ($user) { return true; });
        Gate::define('account.withdrawal.bulk-delete', function ($user) { return true; });

        Gate::define('account.receivere', function ($user) { return true; });
        Gate::define('account.receivere.index', function ($user) { return true; });
        Gate::define('account.receivere.create', function ($user) { return true; });
        Gate::define('account.receivere.show', function ($user) { return true; });
        Gate::define('account.receivere.edit', function ($user) { return true; });
        Gate::define('account.receivere.delete', function ($user) { return true; });
        Gate::define('account.receivere.bulk-delete', function ($user) { return true; });

    }
}
