import AppForm from '../app-components/Form/AppForm';

Vue.component('wallet-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                money:  '' ,
                belongs_to_type:  '' ,
                belongs_to_id:  '' ,
                
            }
        }
    }

});