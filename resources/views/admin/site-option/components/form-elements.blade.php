<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight_default'), 'has-success': fields.weight_default && fields.weight_default.valid }">
    <label for="weight_default" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.site-option.columns.weight_default') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight_default" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight_default'), 'form-control-success': fields.weight_default && fields.weight_default.valid}" id="weight_default" name="weight_default" placeholder="{{ trans('admin.site-option.columns.weight_default') }}">
        <div v-if="errors.has('weight_default')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('weight_default') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight_fee'), 'has-success': fields.weight_fee && fields.weight_fee.valid }">
    <label for="weight_fee" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.site-option.columns.weight_fee') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight_fee" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight_fee'), 'form-control-success': fields.weight_fee && fields.weight_fee.valid}" id="weight_fee" name="weight_fee" placeholder="{{ trans('admin.site-option.columns.weight_fee') }}">
        <div v-if="errors.has('weight_fee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('weight_fee') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('pickup'), 'has-success': fields.pickup && fields.pickup.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="pickup" type="checkbox" v-model="form.pickup" v-validate="''" data-vv-name="pickup"  name="pickup_fake_element">
        <label class="form-check-label" for="pickup">
            {{ trans('admin.site-option.columns.pickup') }}
        </label>
        <input type="hidden" name="pickup" :value="form.pickup">
        <div v-if="errors.has('pickup')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pickup') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pickup_fee'), 'has-success': fields.pickup_fee && fields.pickup_fee.valid }">
    <label for="pickup_fee" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.site-option.columns.pickup_fee') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pickup_fee" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pickup_fee'), 'form-control-success': fields.pickup_fee && fields.pickup_fee.valid}" id="pickup_fee" name="pickup_fee" placeholder="{{ trans('admin.site-option.columns.pickup_fee') }}">
        <div v-if="errors.has('pickup_fee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pickup_fee') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('todoor'), 'has-success': fields.todoor && fields.todoor.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="todoor" type="checkbox" v-model="form.todoor" v-validate="''" data-vv-name="todoor"  name="todoor_fake_element">
        <label class="form-check-label" for="todoor">
            {{ trans('admin.site-option.columns.todoor') }}
        </label>
        <input type="hidden" name="todoor" :value="form.todoor">
        <div v-if="errors.has('todoor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('todoor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('todoor_fee'), 'has-success': fields.todoor_fee && fields.todoor_fee.valid }">
    <label for="todoor_fee" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.site-option.columns.todoor_fee') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.todoor_fee" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('todoor_fee'), 'form-control-success': fields.todoor_fee && fields.todoor_fee.valid}" id="todoor_fee" name="todoor_fee" placeholder="{{ trans('admin.site-option.columns.todoor_fee') }}">
        <div v-if="errors.has('todoor_fee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('todoor_fee') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('express'), 'has-success': fields.express && fields.express.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="express" type="checkbox" v-model="form.express" v-validate="''" data-vv-name="express"  name="express_fake_element">
        <label class="form-check-label" for="express">
            {{ trans('admin.site-option.columns.express') }}
        </label>
        <input type="hidden" name="express" :value="form.express">
        <div v-if="errors.has('express')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('express') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('express_fee'), 'has-success': fields.express_fee && fields.express_fee.valid }">
    <label for="express_fee" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.site-option.columns.express_fee') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.express_fee" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('express_fee'), 'form-control-success': fields.express_fee && fields.express_fee.valid}" id="express_fee" name="express_fee" placeholder="{{ trans('admin.site-option.columns.express_fee') }}">
        <div v-if="errors.has('express_fee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('express_fee') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('breakable'), 'has-success': fields.breakable && fields.breakable.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="breakable" type="checkbox" v-model="form.breakable" v-validate="''" data-vv-name="breakable"  name="breakable_fake_element">
        <label class="form-check-label" for="breakable">
            {{ trans('admin.site-option.columns.breakable') }}
        </label>
        <input type="hidden" name="breakable" :value="form.breakable">
        <div v-if="errors.has('breakable')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('breakable') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('breakable_fee'), 'has-success': fields.breakable_fee && fields.breakable_fee.valid }">
    <label for="breakable_fee" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.site-option.columns.breakable_fee') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.breakable_fee" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('breakable_fee'), 'form-control-success': fields.breakable_fee && fields.breakable_fee.valid}" id="breakable_fee" name="breakable_fee" placeholder="{{ trans('admin.site-option.columns.breakable_fee') }}">
        <div v-if="errors.has('breakable_fee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('breakable_fee') }}</div>
    </div>
</div>


