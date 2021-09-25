import AppForm from '../app-components/Form/AppForm';

Vue.component('place-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                enabled:  false ,
                parent_id:  '' ,
                branch_id:  '' ,
                
            }
        }
    }

});