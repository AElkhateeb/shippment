@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.receiver.actions.edit', ['name' => $receiver->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <receiver-form
                :action="'{{ $receiver->resource_url }}'"
                :data="{{ $receiver->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.receiver.actions.edit', ['name' => $receiver->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.receiver.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </receiver-form>

        </div>
    
</div>

@endsection