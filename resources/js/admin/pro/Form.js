import AppForm from '../app-components/Form/AppForm';

Vue.component('pro-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                icon:  '' ,
                title:  this.getLocalizedFormDefaults() ,
                text:  this.getLocalizedFormDefaults() ,
                
            }
        }
    }

});