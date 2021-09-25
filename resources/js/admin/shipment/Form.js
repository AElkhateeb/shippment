import AppForm from '../app-components/Form/AppForm';

Vue.component('shipment-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                pkg_num:  '' ,
                road_id:  '' ,
                place_from_id:  '' ,
                branch_from_id:  '' ,
                place_to_id:  '' ,
                branch_to_id:  '' ,
                weight:  '' ,
                pickup:  false ,
                todoor:  false ,
                express:  false ,
                breakable:  false ,
                shipper_type:  '' ,
                shipper_id:  '' ,
                receiver_id:  '' ,
                status:  '' ,
                published_at:  '' ,
                end_at:  '' ,
                shipp_price:  '' ,
                shipp_cost:  '' ,
                shipp_sale:  '' ,
                shipp_total:  '' ,
                payment_method_id:  '' ,

            }
        }
    }

});
