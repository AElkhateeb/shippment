import AppForm from '../app-components/Form/AppForm';

Vue.component('identity-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  this.getLocalizedFormDefaults() ,
                text:  this.getLocalizedFormDefaults() ,
            },
            mediaCollections: ['identity'],
        }
    }

});
