<template>
    <div class="bgc-white bd bdrs-3 p-20 mB-20 mT-15">
        <div class="row">
            <h4 class="col-sm-6 c-grey-900 mB-20"><i class="c-blue-500 ti-package mR-15"></i>Products</h4>
            <div class="col-sm-6">
                <div class="btn-group pull-right">
                    <button type="button"
                        class="btn btn-primary"
                        @click="createModal = true">New Product</button>
                </div>
            </div>
        </div>
        <products></products>

        <!-- product create model -->
        <product-form v-show="createModal"></product-form>
        <!-- product create modal end -->
    </div>
</template>

<script>
    import products from './Index'
    import ProductForm from './Form'
    import {EventBus} from "@/event-bus"

    export default {
        name: "product-page",
        components: {
            products,
            ProductForm
        },
        data (){
            return {
                createModal: false
            }
        },
        mounted (){
            EventBus.$on('modalClose', () => {this.createModal = false});
        },
        methods: {
            closeModal(){
                this.createModal = false
            },
        },
        beforeDestroy() {
            EventBus.$off('modalClose')
        }
    }
</script>

<style scoped>

</style>