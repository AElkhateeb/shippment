import AppListing from '../app-components/Listing/AppListing';

Vue.component('shipment-listing', {
    mixins: [AppListing],
    data() {
        return {
            showRoadsFilter: false,
            roadsMultiselect: {},

            filters: {
                roads: [],
            },
        }
    },

    watch: {
        showRoadsFilter: function (newVal, oldVal) {
            this.roadsMultiselect = [];
        },
        roadsMultiselect: function(newVal, oldVal) {
            this.filters.roads = newVal.map(function(object) { return object['key']; });
            this.filter('roads', this.filters.roads);
        }
    }
});
