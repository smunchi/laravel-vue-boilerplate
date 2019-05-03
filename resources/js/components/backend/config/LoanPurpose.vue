<template>
    <div class="bgc-white bd bdrs-3 p-20 mB-20 mT-15">
        <div class="row">
            <h4 class="col-sm-6 c-grey-900 mB-20">
                <i class="c-deep-orange-500 ti-shield mR-15"></i>Loan purposes</h4>
            <div class="col-sm-6">
                <div class="btn-group pull-right">
                    <a href="#" @click.prevent="showCreateModal()"
                       class="btn btn-primary">New loan purpose</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody v-if="loanPurposes.length > 0">
                    <tr v-for="(loanPurpose, index) in loanPurposes">
                        <td>{{ index + 1 }}</td>
                        <td>{{ loanPurpose.name }}</td>
                        <td>{{ loanPurpose.description }}</td>
                        <td>
                            <a href="#" class="mL-5 mR-5 text-primary"
                               @click.prevent="showEditModal(loanPurpose)"
                               data-toggle="tooltip"
                               title="Edit">
                                <i class="ti-pencil-alt"></i></a>
                            <a href="" class="mL-5 mR-5 text-danger"
                               data-toggle="tooltip"
                               @click.prevent="deleteLoanPurpose(loanPurpose)"
                               title="Delete">
                                <i class="ti-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

<!--        loan purpose modal for create and edit-->
        <modal v-if="showModal" :customClass="'sm'">
            <template  v-slot:header>
                <h4 class="col-sm-6 c-grey-900 p-20">
                    <i class="c-blue-500 ti-package mR-15"></i>
                    Loan purpose form
                </h4>
            </template>
            <template v-slot:body>
                <form action="post" @submit.prevent="submitForm()" class="p-20">
                    <div class="form-group">
                        <label for="loan_purpose_name">Name</label>
                        <input type="text"
                            v-model="selectedLoanPurpose.name"
                           v-validate="'required'"
                           :class="{'is-invalid':errors.first('name')}"
                           name="name"
                           class="form-control" placeholder="Name">
                        <div v-if="errors.first('name')"
                             class="invalid-feedback">{{ errors.first('name') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="loan_purpose_name">Description</label>
                        <textarea v-model="selectedLoanPurpose.description"
                                  class="form-control" placeholder="Decription"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-cloud-up mR-5"></i>
                            <span v-if="method === 'put'">Update</span>
                            <span v-else>Store</span>
                        </button>
                    </div>
                </form>
            </template>
        </modal>
    </div>
</template>

<script>
    import client from '@/client'
    import Loader from '@comp/lib/Loader'
    import alertify from 'alertifyjs'
    import modal from '@comp/lib/Modal'
    import {EventBus} from "@/event-bus"

    export default {
        name: "loan-purpose-page",
        components: { Loader, modal },
        data() {
            return {
                loader: true,
                loanPurposes: [],
                selectedLoanPurpose: {},
                method: 'post',
                showModal: false,
            }
        },
        mounted() {
            this.fetchLoanPurpose()
            EventBus.$on('modalClose', () => {this.showModal = false});
        },
        methods: {
            fetchLoanPurpose() {
                client.get(route)
                    .then(response => {
                        this.loanPurposes = response.data
                        this.loader = false
                        console.log(response)
                    })
            },
            submitForm() {
                if (this.method === 'post') {
                    return this.storeLoanPurpose();
                }
                if (this.method === 'put') {
                    return this.updateLoanPurpose();
                }
            },
            storeLoanPurpose() {
                let self = this
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        client.post(route, self.selectedLoanPurpose)
                            .then(response => {
                                console.log(response);
                                if(response.status >=200 && response.status < 300) {
                                    self.selectedLoanPurpose = {}
                                    self.showModal = false
                                    self.fetchLoanPurpose()
                                    alertify.success(response.data.message)
                                }
                            });
                        return;
                    }
                    alertify.warning('Correct above errors!')
                });
            },
            updateLoanPurpose() {
                let self = this
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        client.put(route +'/'+ self.selectedLoanPurpose.id, self.selectedLoanPurpose)
                            .then(response => {
                                console.log(response);
                                if(response.status >=200 && response.status < 300) {
                                    self.selectedLoanPurpose = {}
                                    self.showModal = false
                                    self.fetchLoanPurpose()
                                    alertify.success(response.data.message)
                                }
                            })
                        return;
                    }
                    alertify.warning('Correct above errors!')
                });
            },
            deleteLoanPurpose(loanPurpose) {
                alertify.confirm('Loan purpose delete', 'Are you sure?', () => {
                    client.delete(route + '/' + loanPurpose.id)
                        .then(response => {
                            alertify.success(response.data.message)
                            this.fetchLoanPurpose();
                        })
                }, () => {});
            },
            showEditModal(loanPurpose) {
                this.selectedLoanPurpose = loanPurpose
                this.showModal = true
                this.method = 'put'
            },
            showCreateModal() {
                this.selectedLoanPurpose = {}
                this.showModal = true
                this.method = 'post'
            }
        },
        beforeDestroy() {
            EventBus.$off('modalClose')
        }
    }
</script>

<style scoped>

</style>