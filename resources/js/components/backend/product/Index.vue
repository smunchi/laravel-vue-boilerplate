<template>
    <div class="table-responsive">
        <template v-if="!loader">
            <table v-if="products.length > 0" class="table table-striped">
                <thead>
                <tr>
                    <th v-for="column in columns">{{ column }}</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(product,index) in products">
                    <td>{{ parseInt(index) + 1 }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.month_range }}</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox"
                                   :checked="Boolean(product.is_active)"
                                   @click.prevent="productActiveToggle(product)"
                                   class="custom-control-input" :id="'productStatus'+product.id">
                            <label class="custom-control-label" :for="'productStatus'+product.id"
                                   v-text="Boolean(product.is_active) ? 'Active':'Off'"></label>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="mL-5 mR-5 text-primary"
                           @click.prevent="showEditModal(product)"
                           data-toggle="tooltip"
                           title="Edit">
                            <i class="ti-pencil-alt"></i></a>
                        <a href="" class="mL-5 mR-5 text-danger"
                           data-toggle="tooltip"
                           @click.prevent="deleteProduct(product)"
                           title="Delete">
                            <i class="ti-trash"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div v-else class="text-dark">No product post yet !!</div>
        </template>
        <template v-else>
            <Loader></Loader>
        </template>
        <product-form :product="editProduct"
                      v-show="editModal"
                      :method="'put'"></product-form>
    </div>
</template>

<script>
    import client from '@/client'
    import alertify from 'alertifyjs'
    import Loader from '@comp/lib/Loader'
    import {products} from "@/static/config/formColumn"
    import {EventBus} from "@/event-bus";
    import ProductForm from './Form'

    export default {
        name: 'products',
        components: {
            Loader, ProductForm
        },
        data() {
            return {
                products: [],
                totalProducts: 0,
                columns: products.columns,
                loader: true,
                productDelete: {},
                editModal: false,
                editProduct: {},
            }
        },
        mounted() {
            this.fetchProducts();
            EventBus.$on('refresh', () => {
                this.fetchProducts()
            })
            EventBus.$on('modalClose', () => {
                this.editModal = false
            });
        },
        updated() {
            $('[data-toggle="tooltip"]').tooltip();
        },
        methods: {
            /**
             * Get all product list for admin
             *
             * @return;
             */
            fetchProducts() {
                client.get(route)
                    .then(response => {
                        this.products = response.data;
                        this.loader = false
                    })
            },
            /**
             * Event for product is active toggle
             *
             * @param Object product
             */
            productActiveToggle(product) {
                let self = this
                alertify.confirm('Product status change','Are you sure?', () => {
                    client.put(route + '/' + product.id + '/active')
                        .then(respone => {
                            alertify.success(respone.data.message)
                            let products = self.products
                            self.products = products.map( obj => {
                                if (obj.id === product.id){
                                    obj.is_active = !obj.is_active
                                }
                                return obj;
                            })
                        })
                },()=>{});
            },
            showEditModal(product) {
                this.editModal = true
                this.editProduct = product
            },
            deleteProduct(product) {
                alertify.confirm('Product delete', 'Are you sure?', () => {
                    client.delete(route + '/' + product.id)
                        .then(respone => {
                            alertify.success(respone.data.message)
                            this.fetchProducts();
                        })
                }, () => {});
            }
        },
        beforeDestroy() {
            EventBus.$off('modalClose')
            EventBus.$off('refresh')
        }
    }
</script>