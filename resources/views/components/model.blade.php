<template>
    <modal name="example">This is an example</modal>
</template>

<script>
    export default {
        name: 'XModal',
        mounted () {
            this.$modal.show('example')
        }
    }
</script>
