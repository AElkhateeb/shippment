<div class="form-group row align-items-center" :class="{'has-danger': errors.has('money'), 'has-success': fields.money && fields.money.valid }">
    <label for="money" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wallet.columns.money') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.money" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('money'), 'form-control-success': fields.money && fields.money.valid}" id="money" name="money" placeholder="{{ trans('admin.wallet.columns.money') }}">
        <div v-if="errors.has('money')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('money') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('belongs_to_type'), 'has-success': fields.belongs_to_type && fields.belongs_to_type.valid }">
    <label for="belongs_to_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wallet.columns.belongs_to_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.belongs_to_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('belongs_to_type'), 'form-control-success': fields.belongs_to_type && fields.belongs_to_type.valid}" id="belongs_to_type" name="belongs_to_type" placeholder="{{ trans('admin.wallet.columns.belongs_to_type') }}">
        <div v-if="errors.has('belongs_to_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('belongs_to_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('belongs_to_id'), 'has-success': fields.belongs_to_id && fields.belongs_to_id.valid }">
    <label for="belongs_to_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wallet.columns.belongs_to_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.belongs_to_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('belongs_to_id'), 'form-control-success': fields.belongs_to_id && fields.belongs_to_id.valid}" id="belongs_to_id" name="belongs_to_id" placeholder="{{ trans('admin.wallet.columns.belongs_to_id') }}">
        <div v-if="errors.has('belongs_to_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('belongs_to_id') }}</div>
    </div>
</div>


