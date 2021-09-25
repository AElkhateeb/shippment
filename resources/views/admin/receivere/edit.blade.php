@extends('admin.layout.default')

@section('title', trans('admin.receivere.actions.edit', ['name' => $receivere->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <receivere-form
                :action="'{{ $receivere->resource_url }}'"
                :data="{{ $receivere->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.receivere.actions.edit', ['name' => $receivere->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.receivere.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </receivere-form>

        </div>

</div>

@endsection
