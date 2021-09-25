<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav expandable">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Web Site
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/sliders') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.slider.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/identities') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.identity.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/pros') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.pro.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/services') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.service.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/jobs') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.job.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/applications') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.application.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/testimonials') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.testimonial.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/socials') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.social.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/contacts') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.contact.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/clients') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.client.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/pages') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.page.title') }}</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/shipments') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.shipment.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/places') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.place.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roads') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.road.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/payment-methods') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.payment-method.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/wallets') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.wallet.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/withdrawals') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.withdrawal.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/contacts') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.contact.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/branches') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.branch.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/receiveres') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.receivere.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/movements') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.movement.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/movement-methods') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.movement-method.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/receivers') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.receiver.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/site-options') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.site-option.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Users access
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage admin ') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/ceo-admin') }}"><i class="nav-icon icon-user"></i> {{ __('Manage ceo ') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/manger-admin') }}"><i class="nav-icon icon-user"></i> {{ __('Manage manger ') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/employee-admin') }}"><i class="nav-icon icon-user"></i> {{ __('Manage employee ') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/seo-admin') }}"><i class="nav-icon icon-user"></i> {{ __('Manage seo ') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/shipper-admin') }}"><i class="nav-icon icon-user"></i> {{ __('Manage shipper ') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/account-admin') }}"><i class="nav-icon icon-user"></i> {{ __('Manage account ') }}</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>

    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
