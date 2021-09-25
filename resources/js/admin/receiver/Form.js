import AppForm from '../app-components/Form/AppForm';

Vue.component('receiver-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                fullname:  '' ,
                address:  '' ,
                phone:  '' ,
                phone_2:  '' ,
                city:  '' ,
                area:  '' ,
                location:  '' ,
                lng:  '' ,
                lat:  '' ,
                governorate:  '' ,
                
            }
        }
    }

});