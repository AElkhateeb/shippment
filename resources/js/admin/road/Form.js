import AppForm from '../app-components/Form/AppForm';

Vue.component('road-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                price:  '' ,
                time:  '' ,
                enabled:  false ,
                pickup:  false ,
                todoor:  false ,
                express:  false ,
                breakable:  false ,
                from_id:  '' ,
                to_id:  '' ,
                
            }
        }
    }

});