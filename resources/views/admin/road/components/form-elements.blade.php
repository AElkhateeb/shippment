<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.road.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.road.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('time'), 'has-success': fields.time && fields.time.valid }">
    <label for="time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.road.columns.time') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.time" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('time'), 'form-control-success': fields.time && fields.time.valid}" id="time" name="time" placeholder="{{ trans('admin.road.columns.time') }}">
        <div v-if="errors.has('time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('time') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.road.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('pickup'), 'has-success': fields.pickup && fields.pickup.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="pickup" type="checkbox" v-model="form.pickup" v-validate="''" data-vv-name="pickup"  name="pickup_fake_element">
        <label class="form-check-label" for="pickup">
            {{ trans('admin.road.columns.pickup') }}
        </label>
        <input type="hidden" name="pickup" :value="form.pickup">
        <div v-if="errors.has('pickup')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pickup') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('todoor'), 'has-success': fields.todoor && fields.todoor.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="todoor" type="checkbox" v-model="form.todoor" v-validate="''" data-vv-name="todoor"  name="todoor_fake_element">
        <label class="form-check-label" for="todoor">
            {{ trans('admin.road.columns.todoor') }}
        </label>
        <input type="hidden" name="todoor" :value="form.todoor">
        <div v-if="errors.has('todoor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('todoor') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('express'), 'has-success': fields.express && fields.express.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="express" type="checkbox" v-model="form.express" v-validate="''" data-vv-name="express"  name="express_fake_element">
        <label class="form-check-label" for="express">
            {{ trans('admin.road.columns.express') }}
        </label>
        <input type="hidden" name="express" :value="form.express">
        <div v-if="errors.has('express')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('express') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('breakable'), 'has-success': fields.breakable && fields.breakable.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="breakable" type="checkbox" v-model="form.breakable" v-validate="''" data-vv-name="breakable"  name="breakable_fake_element">
        <label class="form-check-label" for="breakable">
            {{ trans('admin.road.columns.breakable') }}
        </label>
        <input type="hidden" name="breakable" :value="form.breakable">
        <div v-if="errors.has('breakable')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('breakable') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('from_id'), 'has-success': fields.from_id && fields.from_id.valid }">
    <label for="from_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.road.columns.from_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.from_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('from_id'), 'form-control-success': fields.from_id && fields.from_id.valid}" id="from_id" name="from_id" placeholder="{{ trans('admin.road.columns.from_id') }}">
        <div v-if="errors.has('from_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('from_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('to_id'), 'has-success': fields.to_id && fields.to_id.valid }">
    <label for="to_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.road.columns.to_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.to_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('to_id'), 'form-control-success': fields.to_id && fields.to_id.valid}" id="to_id" name="to_id" placeholder="{{ trans('admin.road.columns.to_id') }}">
        <div v-if="errors.has('to_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('to_id') }}</div>
    </div>
</div>


