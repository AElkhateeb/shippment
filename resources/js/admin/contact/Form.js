import AppForm from '../app-components/Form/AppForm';

Vue.component('contact-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                icon:  '' ,
                title:  this.getLocalizedFormDefaults() ,
                text:  this.getLocalizedFormDefaults() ,
                is_published:  false ,
                branch_id:  '' ,
                
            }
        }
    }

});