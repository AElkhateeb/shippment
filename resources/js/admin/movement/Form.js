import AppForm from '../app-components/Form/AppForm';

Vue.component('movement-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                reason:  '' ,
                shipment_id:  '' ,
                method_id:  '' ,
                employee_type:  '' ,
                employee_id:  '' ,
                branch_id:  '' ,
                method_parent_id:  '' ,
                
            }
        }
    }

});