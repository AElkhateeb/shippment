<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fullname'), 'has-success': fields.fullname && fields.fullname.valid }">
    <label for="fullname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receivere.columns.fullname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fullname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fullname'), 'form-control-success': fields.fullname && fields.fullname.valid}" id="fullname" name="fullname" placeholder="{{ trans('admin.receivere.columns.fullname') }}">
        <div v-if="errors.has('fullname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fullname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receivere.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.receivere.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receivere.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.receivere.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone_2'), 'has-success': fields.phone_2 && fields.phone_2.valid }">
    <label for="phone_2" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receivere.columns.phone_2') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone_2" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone_2'), 'form-control-success': fields.phone_2 && fields.phone_2.valid}" id="phone_2" name="phone_2" placeholder="{{ trans('admin.receivere.columns.phone_2') }}">
        <div v-if="errors.has('phone_2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone_2') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city'), 'has-success': fields.city && fields.city.valid }">
    <label for="city" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receivere.columns.city') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.city" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('city'), 'form-control-success': fields.city && fields.city.valid}" id="city" name="city" placeholder="{{ trans('admin.receivere.columns.city') }}">
        <div v-if="errors.has('city')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('city') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('area'), 'has-success': fields.area && fields.area.valid }">
    <label for="area" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.receivere.columns.area') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.area" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('area'), 'form-control-success': fields.area && fields.area.valid}" id="area" name="area" placeholder="{{ trans('admin.receivere.columns.area') }}">
        <div v-if="errors.has('area')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('area') }}</div>
    </div>
</div>


