import AppForm from '../app-components/Form/AppForm';

Vue.component('slider-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  this.getLocalizedFormDefaults() ,
                sub_title:  this.getLocalizedFormDefaults() ,
                text:  this.getLocalizedFormDefaults()

            },
        mediaCollections: ['slider'],
        }
    }

});
