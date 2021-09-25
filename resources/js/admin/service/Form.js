import AppForm from '../app-components/Form/AppForm';

Vue.component('service-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  this.getLocalizedFormDefaults() ,
                text:  this.getLocalizedFormDefaults() ,
                body:  this.getLocalizedFormDefaults() ,
                is_published:  false ,

            },
            mediaCollections: ['service'],
        }
    }

});
