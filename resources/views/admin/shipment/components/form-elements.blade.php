<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pkg_num'), 'has-success': fields.pkg_num && fields.pkg_num.valid }">
    <label for="pkg_num" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.pkg_num') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.pkg_num" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('pkg_num'), 'form-control-success': fields.pkg_num && fields.pkg_num.valid}" id="pkg_num" name="pkg_num" placeholder="{{ trans('admin.shipment.columns.pkg_num') }}">
        <div v-if="errors.has('pkg_num')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pkg_num') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shipper_id'), 'has-success': fields.shipper_id && fields.shipper_id.valid }">
    <label for="shipper_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.shipper_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shipper_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shipper_id'), 'form-control-success': fields.shipper_id && fields.shipper_id.valid}" id="shipper_id" name="shipper_id" placeholder="{{ trans('admin.shipment.columns.shipper_id') }}">
        <div v-if="errors.has('shipper_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('shipper_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shipp_total'), 'has-success': fields.shipp_total && fields.shipp_total.valid }">
    <label for="shipp_total" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.shipp_total') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shipp_total" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shipp_total'), 'form-control-success': fields.shipp_total && fields.shipp_total.valid}" id="shipp_total" name="shipp_total" placeholder="{{ trans('admin.shipment.columns.shipp_total') }}">
        <div v-if="errors.has('shipp_total')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('shipp_total') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shipp_sale'), 'has-success': fields.shipp_sale && fields.shipp_sale.valid }">
    <label for="shipp_sale" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.shipp_sale') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shipp_sale" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shipp_sale'), 'form-control-success': fields.shipp_sale && fields.shipp_sale.valid}" id="shipp_sale" name="shipp_sale" placeholder="{{ trans('admin.shipment.columns.shipp_sale') }}">
        <div v-if="errors.has('shipp_sale')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('shipp_sale') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shipp_cost'), 'has-success': fields.shipp_cost && fields.shipp_cost.valid }">
    <label for="shipp_cost" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.shipp_cost') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shipp_cost" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shipp_cost'), 'form-control-success': fields.shipp_cost && fields.shipp_cost.valid}" id="shipp_cost" name="shipp_cost" placeholder="{{ trans('admin.shipment.columns.shipp_cost') }}">
        <div v-if="errors.has('shipp_cost')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('shipp_cost') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shipp_price'), 'has-success': fields.shipp_price && fields.shipp_price.valid }">
    <label for="shipp_price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.shipp_price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shipp_price" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shipp_price'), 'form-control-success': fields.shipp_price && fields.shipp_price.valid}" id="shipp_price" name="shipp_price" placeholder="{{ trans('admin.shipment.columns.shipp_price') }}">
        <div v-if="errors.has('shipp_price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('shipp_price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_at'), 'has-success': fields.end_at && fields.end_at.valid }">
    <label for="end_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.end_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end_at'), 'form-control-success': fields.end_at && fields.end_at.valid}" id="end_at" name="end_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_at') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status'), 'form-control-success': fields.status && fields.status.valid}" id="status" name="status" placeholder="{{ trans('admin.shipment.columns.status') }}">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('receiver_id'), 'has-success': fields.receiver_id && fields.receiver_id.valid }">
    <label for="receiver_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.receiver_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.receiver_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('receiver_id'), 'form-control-success': fields.receiver_id && fields.receiver_id.valid}" id="receiver_id" name="receiver_id" placeholder="{{ trans('admin.shipment.columns.receiver_id') }}">
        <div v-if="errors.has('receiver_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('receiver_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shipper_type'), 'has-success': fields.shipper_type && fields.shipper_type.valid }">
    <label for="shipper_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.shipper_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shipper_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shipper_type'), 'form-control-success': fields.shipper_type && fields.shipper_type.valid}" id="shipper_type" name="shipper_type" placeholder="{{ trans('admin.shipment.columns.shipper_type') }}">
        <div v-if="errors.has('shipper_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('shipper_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('road_id'), 'has-success': fields.road_id && fields.road_id.valid }">
    <label for="road_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.road_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.road_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('road_id'), 'form-control-success': fields.road_id && fields.road_id.valid}" id="road_id" name="road_id" placeholder="{{ trans('admin.shipment.columns.road_id') }}">
        <div v-if="errors.has('road_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('road_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('breakable'), 'has-success': fields.breakable && fields.breakable.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="breakable" type="checkbox" v-model="form.breakable" v-validate="''" data-vv-name="breakable"  name="breakable_fake_element">
        <label class="form-check-label" for="breakable">
            {{ trans('admin.shipment.columns.breakable') }}
        </label>
        <input type="hidden" name="breakable" :value="form.breakable">
        <div v-if="errors.has('breakable')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('breakable') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('express'), 'has-success': fields.express && fields.express.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="express" type="checkbox" v-model="form.express" v-validate="''" data-vv-name="express"  name="express_fake_element">
        <label class="form-check-label" for="express">
            {{ trans('admin.shipment.columns.express') }}
        </label>
        <input type="hidden" name="express" :value="form.express">
        <div v-if="errors.has('express')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('express') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('todoor'), 'has-success': fields.todoor && fields.todoor.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="todoor" type="checkbox" v-model="form.todoor" v-validate="''" data-vv-name="todoor"  name="todoor_fake_element">
        <label class="form-check-label" for="todoor">
            {{ trans('admin.shipment.columns.todoor') }}
        </label>
        <input type="hidden" name="todoor" :value="form.todoor">
        <div v-if="errors.has('todoor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('todoor') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('pickup'), 'has-success': fields.pickup && fields.pickup.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="pickup" type="checkbox" v-model="form.pickup" v-validate="''" data-vv-name="pickup"  name="pickup_fake_element">
        <label class="form-check-label" for="pickup">
            {{ trans('admin.shipment.columns.pickup') }}
        </label>
        <input type="hidden" name="pickup" :value="form.pickup">
        <div v-if="errors.has('pickup')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pickup') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight'), 'has-success': fields.weight && fields.weight.valid }">
    <label for="weight" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.weight') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight'), 'form-control-success': fields.weight && fields.weight.valid}" id="weight" name="weight" placeholder="{{ trans('admin.shipment.columns.weight') }}">
        <div v-if="errors.has('weight')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('weight') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('branch_to_id'), 'has-success': fields.branch_to_id && fields.branch_to_id.valid }">
    <label for="branch_to_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.branch_to_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.branch_to_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('branch_to_id'), 'form-control-success': fields.branch_to_id && fields.branch_to_id.valid}" id="branch_to_id" name="branch_to_id" placeholder="{{ trans('admin.shipment.columns.branch_to_id') }}">
        <div v-if="errors.has('branch_to_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('branch_to_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('place_to_id'), 'has-success': fields.place_to_id && fields.place_to_id.valid }">
    <label for="place_to_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.place_to_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.place_to_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('place_to_id'), 'form-control-success': fields.place_to_id && fields.place_to_id.valid}" id="place_to_id" name="place_to_id" placeholder="{{ trans('admin.shipment.columns.place_to_id') }}">
        <div v-if="errors.has('place_to_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('place_to_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('branch_from_id'), 'has-success': fields.branch_from_id && fields.branch_from_id.valid }">
    <label for="branch_from_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.branch_from_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.branch_from_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('branch_from_id'), 'form-control-success': fields.branch_from_id && fields.branch_from_id.valid}" id="branch_from_id" name="branch_from_id" placeholder="{{ trans('admin.shipment.columns.branch_from_id') }}">
        <div v-if="errors.has('branch_from_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('branch_from_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('place_from_id'), 'has-success': fields.place_from_id && fields.place_from_id.valid }">
    <label for="place_from_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.place_from_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.place_from_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('place_from_id'), 'form-control-success': fields.place_from_id && fields.place_from_id.valid}" id="place_from_id" name="place_from_id" placeholder="{{ trans('admin.shipment.columns.place_from_id') }}">
        <div v-if="errors.has('place_from_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('place_from_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('payment_method_id'), 'has-success': fields.payment_method_id && fields.payment_method_id.valid }">
    <label for="payment_method_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.shipment.columns.payment_method_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.payment_method_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('payment_method_id'), 'form-control-success': fields.payment_method_id && fields.payment_method_id.valid}" id="payment_method_id" name="payment_method_id" placeholder="{{ trans('admin.shipment.columns.payment_method_id') }}">
        <div v-if="errors.has('payment_method_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('payment_method_id') }}</div>
    </div>
</div>


