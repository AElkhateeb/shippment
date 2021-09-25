import AppForm from '../app-components/Form/AppForm';

Vue.component('site-option-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                weight_default:  '' ,
                weight_fee:  '' ,
                pickup:  false ,
                pickup_fee:  '' ,
                todoor:  false ,
                todoor_fee:  '' ,
                express:  false ,
                express_fee:  '' ,
                breakable:  false ,
                breakable_fee:  '' ,
                
            }
        }
    }

});