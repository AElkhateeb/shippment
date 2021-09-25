import AppForm from '../app-components/Form/AppForm';

Vue.component('branch-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                location:  '' ,
                lng:  '' ,
                lat:  '' ,
                name:  this.getLocalizedFormDefaults() ,
                governorate:  this.getLocalizedFormDefaults() ,
                is_published:  false ,
                manger:  '' ,
                agent:  '' ,
                
            }
        }
    }

});