import AppForm from '../app-components/Form/AppForm';

Vue.component('withdrawal-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                price:  '' ,
                reason_type:  '' ,
                reason_id:  '' ,
                made_type:  '' ,
                made_id:  '' ,
                in_out:  false ,
                enabled:  false ,
                from_id:  '' ,
                to_id:  '' ,
                payment_method_id:  '' ,
                
            }
        }
    }

});