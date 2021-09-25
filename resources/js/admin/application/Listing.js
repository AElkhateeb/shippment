import AppListing from '../app-components/Listing/AppListing';

Vue.component('application-listing', {
    mixins: [AppListing],
    data() {
        return {
            showJobsFilter: false,
            jobsMultiselect: {},

            filters: {
                jobs: [],
            },
        }
    },
    watch: {
        showJobsFilter: function (newVal, oldVal) {
            this.jobsMultiselect = [];
        },
        jobsMultiselect: function(newVal, oldVal) {
            this.filters.jobs = newVal.map(function(object) { return object['key']; });
            this.filter('jobs', this.filters.jobs);
        }
    }
});
