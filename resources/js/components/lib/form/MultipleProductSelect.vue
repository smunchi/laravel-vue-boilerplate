<template>
    <div class="">
        <div v-for="product in mergeProducts" class="form-inline mb-2">
            <div class="form-check">
                <input @change="selectProduct($event)" v-model="product.select" class="form-check-input" type="checkbox">
                <label class="form-check-label mr-2"><b>{{product.name}}</b></label>
            </div>
            <div class="form-group mx-sm-1">
                <input type="text" @keyup="selectProduct($event)"
                       v-model="product.min_loan"
                       v-validate="product.select?'required':''"
                       class="form-control product-form-control" placeholder="Min Loan"
                       :disabled="!product.select">
            </div>
            <div class="form-group mx-sm-1">
                <input type="text" @keyup="selectProduct($event)"
                       v-model="product.max_loan"
                       v-validate="product.select?'required':''"
                       class="form-control product-form-control" placeholder="Max Loan"
                       :disabled="!product.select">
            </div>
            <small class="text-danger" v-if="product.select && !product.min_loan && !product.max_loan">You must provide min loan </small>

        </div>
    </div>
</template>

<script>
    import client from '@/client'
    export default {
        name: "multiple-product-select",
        data (){
            return {
                products: [],
            }
        },
        inject: ['$validator'],
        props: {
            value: {
                required: false
            }
        },
        computed: {
            mergeProducts() {
                if(!_.isEmpty(this.value)) {
                    let self = this
                    return this.products.map((product) => {
                        let find = _.find(self.value, value => value.id === product.id && value.select === true)
                         if(find) {
                             product.select = true;
                             product.max_loan = find.max_loan
                             product.min_loan = find.min_loan
                         }
                         return product
                    });
                }
                return this.products;
            }
        },
        mounted() {
            this.fetchProducts()
        },
        methods: {
            fetchProducts() {
                client.get('/admin/api/products')
                    .then(response => {
                        this.products = response.data.map((product) => {
                            return {
                                id: product.id, name: product.name, min_loan: null, max_loan: null, select: false
                            }
                        });
                    })
            },
            selectProduct (){
                this.$emit('input', this.mergeProducts)
            }
        }
    }
</script>

<style scoped>
    .form-inline .form-control {
        width: 7rem;
    }
    .product-form-control {
        height: auto;
        padding: 0.1rem 0.5rem;
    }
</style>