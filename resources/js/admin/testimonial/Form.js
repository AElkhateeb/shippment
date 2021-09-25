import AppForm from '../app-components/Form/AppForm';

Vue.component('testimonial-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  this.getLocalizedFormDefaults() ,
                job:  this.getLocalizedFormDefaults() ,
                text:  this.getLocalizedFormDefaults() ,
                is_published:  false ,

            },
            mediaCollections: ['testimonial'],
        }
    }

});
