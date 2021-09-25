import AppForm from '../app-components/Form/AppForm';

Vue.component('movement-method-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                method:  this.getLocalizedFormDefaults() ,
                parent_id:  '' ,
                
            }
        }
    }

});