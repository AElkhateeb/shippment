import AppForm from '../app-components/Form/AppForm';

Vue.component('page-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  this.getLocalizedFormDefaults() ,
                description:  this.getLocalizedFormDefaults() ,
                h1:  this.getLocalizedFormDefaults() ,
                is_published:  false ,

            },
            mediaCollections: ['page'],
        }
    }

});
