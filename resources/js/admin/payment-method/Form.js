import AppForm from '../app-components/Form/AppForm';

Vue.component('payment-method-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  this.getLocalizedFormDefaults() ,
                fees:  '' ,
                sale:  '' ,
                enabled:  false ,
                
            }
        }
    }

});