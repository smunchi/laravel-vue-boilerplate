<template>
    <div class="table-responsive">
        <table v-if="settings.length > 0" class="table table-striped">
            <thead>
                <tr>
                    <th>Group</th>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr  v-for="(setting, index) in settings">
                    <td>{{setting.group}}</td>
                    <td>{{setting.name}}</td>
                    <td>
                        <div v-if="!setting.form">
                            <span>{{ setting.value }}</span>
                            <a href="#" class="mL-10 text-primary"
                               data-toggle="tooltip" title="Edit"
                               @click.prevent="toggleForm(index)">
                                <i class="ti-pencil-alt"></i>
                            </a>
                        </div>
                        <div v-else-if="setting.form === true">
                            <form class="form-inline" method="put"
                                  @submit.prevent="updateSetting(index)">
                                <div class="input-group mr-sm-2">
                                    <input type="text" v-model="setting.value" class="form-control" placeholder="Value">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import client from '@/client'
    import alertify from 'alertifyjs'
    export default {
        name: "settings-form",
        data() {
            return {
                settings: [],
            }
        },
        mounted() {
            this.fetchSettings();
        },
        methods: {
            fetchSettings() {
                client.get(route)
                    .then(response => {
                        if (response.status >= 200 && response.status < 300) {
                            this.settings = response.data.map(setting => {
                                setting.form = false
                                return setting
                            })
                        }
                    });
            },
            updateSetting(index) {
                let self = this
                client.put(route, self.settings[index])
                    .then(response => {
                        if (response.status >= 200 && response.status < 300) {
                            self.settings[index].form = false
                            alertify.success(response.data.message)
                        }
                    })
            },
            toggleForm(index) {
                if (typeof this.settings[index] === 'undefined') {
                    return false;
                }
                if (typeof this.settings[index].form === 'undefined') {
                    return this.settings[index].form = true
                }
                return this.settings[index].form = !this.settings[index].form
            }

        },
        updated() {
            $('[data-toggle="tooltip"]').tooltip();
        },
    }
</script>

<style scoped>

</style>