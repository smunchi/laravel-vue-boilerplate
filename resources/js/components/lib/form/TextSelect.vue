<template>
    <div class="row">
        <div v-for="product in products" class="col-sm-4 mB-15">
            <a href="#"
               :class="{active: (activeID === product.id || value === product.id), disabled: disable}"
               @click.prevent="selectText(product)"
               :disable="disable"
               class="btn cur-p btn-outline-dark w-100">{{ product.name }}</a>
        </div>
    </div>
</template>

<script>
    import client from '@/client'
    export default {
        name: "text-select",
        data (){
            return {
                products: [],
                activeID: ''
            }
        },
        props: {
            value: {
                required: false
            },
            disable: {
                type: Boolean,
                required: false,
                default: false
            }
        },
        mounted() {
            this.fetchProducts()
        },
        methods: {
            fetchProducts() {
                client.get('/admin/api/products')
                    .then(response => {
                        this.products = response.data;
                    })
            },
            selectText (textObject){
                this.activeID = textObject.id
                this.$emit('input', textObject.id)
            }
        }
    }
</script>

<style scoped>
    .active.disabled {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }
</style>