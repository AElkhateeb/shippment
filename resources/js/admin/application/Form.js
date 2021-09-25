import AppForm from '../app-components/Form/AppForm';

Vue.component('application-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                fullname:  '' ,
                job_id:  '' ,
                bday:  '' ,
                male:  false ,
                military:  '' ,
                email:  '' ,
                phone:  '' ,
                phone_2:  '' ,
                city:  '' ,
                area:  '' ,
                education:  '' ,
                experience:  '' ,
                job:  '',
            }
        }
    },
    props: [
        'jobs'
    ]

});
