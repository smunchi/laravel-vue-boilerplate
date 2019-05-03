<template>
    <modal :customClass="'sm'">
        <template  v-slot:header>
            <h4 class="col-sm-6 c-grey-900 p-20">
                <i class="c-blue-500 ti-package mR-15"></i>
                Product
            </h4>
        </template>
        <template v-slot:body>
            <form class="pL-20 pR-20 mB-20"
                  :class="{'was-validated': errors.length > 0}"
                  @submit.prevent="formSubmit"
                  method="post">
                <div class="form-group">
                    <label for="name"> Name </label>
                    <input type="text"
                           id="name"
                           v-validate="'required'"
                           :class="{'is-invalid':errors.first('name')}"
                           name="name"
                           v-model="product.name"
                           class="form-control" placeholder="Name">
                    <div v-if="errors.first('name')"
                         class="invalid-feedback">{{ errors.first('name') }}</div>
                </div>
                <div class="form-group">
                    <label for="min_month"> Month range </label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="number"
                                   id="min_month"
                                   v-validate="'required|numeric'"
                                   :class="{'is-invalid':errors.first('min_month')}"
                                   name="min_month"
                                   v-model="product.min_month"
                                   class="form-control" placeholder="From">
                            <div v-if="errors.first('min_month')"
                                 class="invalid-feedback">{{ errors.first('min_month') }}</div>
                        </div>
                        <div class="col-sm-6">
                            <input type="number"
                                   v-validate="'required|numeric'"
                                   :class="{'is-invalid':errors.first('max_month')}"
                                   name="max_month"
                                   v-model="product.max_month"
                                   class="form-control" placeholder="To">
                            <div v-if="errors.first('max_month')"
                                 class="invalid-feedback">{{ errors.first('max_month') }}</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Detail</label>
                    <textarea v-model="product.description" id="description"
                              class="form-control" placeholder="Product Detail"></textarea>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input v-model="product.is_active"
                               class="form-check-input" type="checkbox">
                        <b>Active product</b>
                    </label>
                </div>
                <hr>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        <i class="ti-upload mR-5"></i>
                        <span v-if="method === 'put'">Update</span>
                        <span v-else>Save</span>
                    </button>
                </div>
            </form>
        </template>
    </modal>
</template>

<script>
    import client from '@/client'
    import alertify from 'alertifyjs'
    import modal from '@comp/lib/Modal'
    import {EventBus} from "@/event-bus"

    export default {
        name: "product-form",
        components: {
            modal
        },
        props: {
            method: {
                type: String,
                required: false,
                default: 'post'
            },
            product: {
                type: Object,
                required: false,
                default: () => { return {}}
            }
        },
        methods: {
            formSubmit(){
                if (this.method && this.method === 'put')
                    return this.productEdit()
                return this.productCreate()
            },
            productCreate (){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        client.post(route, this.product)
                            .then(response => {
                                EventBus.$emit('refresh')
                                EventBus.$emit('modalClose')
                                alertify.success(response.data.message)
                            })
                        return;
                    }
                    alertify.warning('Correct above errors!')
                });
            },
            productEdit (){
                let self = this
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        client.put(route + '/' + self.product.id, self.product)
                            .then(response => {
                                EventBus.$emit('refresh')
                                EventBus.$emit('modalClose')
                                alertify.success(response.data.message)
                            })
                        return;
                    }
                    alertify.warning('Correct above errors!')
                });
            },
        }
    }
</script>

<style scoped>

</style>
