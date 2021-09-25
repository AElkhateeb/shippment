@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.withdrawal.actions.edit', ['name' => $withdrawal->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <withdrawal-form
                :action="'{{ $withdrawal->resource_url }}'"
                :data="{{ $withdrawal->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.withdrawal.actions.edit', ['name' => $withdrawal->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.withdrawal.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </withdrawal-form>

        </div>
    
</div>

@endsection