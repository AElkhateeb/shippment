<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.withdrawal.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reason_type'), 'has-success': fields.reason_type && fields.reason_type.valid }">
    <label for="reason_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.reason_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reason_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reason_type'), 'form-control-success': fields.reason_type && fields.reason_type.valid}" id="reason_type" name="reason_type" placeholder="{{ trans('admin.withdrawal.columns.reason_type') }}">
        <div v-if="errors.has('reason_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reason_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reason_id'), 'has-success': fields.reason_id && fields.reason_id.valid }">
    <label for="reason_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.reason_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.reason_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('reason_id'), 'form-control-success': fields.reason_id && fields.reason_id.valid}" id="reason_id" name="reason_id" placeholder="{{ trans('admin.withdrawal.columns.reason_id') }}">
        <div v-if="errors.has('reason_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reason_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('made_type'), 'has-success': fields.made_type && fields.made_type.valid }">
    <label for="made_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.made_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.made_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('made_type'), 'form-control-success': fields.made_type && fields.made_type.valid}" id="made_type" name="made_type" placeholder="{{ trans('admin.withdrawal.columns.made_type') }}">
        <div v-if="errors.has('made_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('made_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('made_id'), 'has-success': fields.made_id && fields.made_id.valid }">
    <label for="made_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.made_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.made_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('made_id'), 'form-control-success': fields.made_id && fields.made_id.valid}" id="made_id" name="made_id" placeholder="{{ trans('admin.withdrawal.columns.made_id') }}">
        <div v-if="errors.has('made_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('made_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('in_out'), 'has-success': fields.in_out && fields.in_out.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="in_out" type="checkbox" v-model="form.in_out" v-validate="''" data-vv-name="in_out"  name="in_out_fake_element">
        <label class="form-check-label" for="in_out">
            {{ trans('admin.withdrawal.columns.in_out') }}
        </label>
        <input type="hidden" name="in_out" :value="form.in_out">
        <div v-if="errors.has('in_out')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('in_out') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.withdrawal.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('from_id'), 'has-success': fields.from_id && fields.from_id.valid }">
    <label for="from_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.from_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.from_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('from_id'), 'form-control-success': fields.from_id && fields.from_id.valid}" id="from_id" name="from_id" placeholder="{{ trans('admin.withdrawal.columns.from_id') }}">
        <div v-if="errors.has('from_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('from_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('to_id'), 'has-success': fields.to_id && fields.to_id.valid }">
    <label for="to_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.to_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.to_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('to_id'), 'form-control-success': fields.to_id && fields.to_id.valid}" id="to_id" name="to_id" placeholder="{{ trans('admin.withdrawal.columns.to_id') }}">
        <div v-if="errors.has('to_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('to_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('payment_method_id'), 'has-success': fields.payment_method_id && fields.payment_method_id.valid }">
    <label for="payment_method_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.withdrawal.columns.payment_method_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.payment_method_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('payment_method_id'), 'form-control-success': fields.payment_method_id && fields.payment_method_id.valid}" id="payment_method_id" name="payment_method_id" placeholder="{{ trans('admin.withdrawal.columns.payment_method_id') }}">
        <div v-if="errors.has('payment_method_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('payment_method_id') }}</div>
    </div>
</div>


