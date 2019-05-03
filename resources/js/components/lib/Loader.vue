<template>
    <spinner size="medium"
        ></spinner>
</template>

<script>
    import Spinner from 'vue-simple-spinner'

    export default {
        name: 'loader',
        components: { Spinner },
        data (){
            return {

            }
        }
    }
</script>