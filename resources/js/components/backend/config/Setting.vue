<template>
    <div class="bgc-white bd bdrs-3 p-20 mB-20 mT-15">
        <div class="row">
            <h4 class="col-sm-6 c-grey-900 mB-20">
                <i class="c-deep-orange-500 ti-settings mR-15"></i>Settings</h4>
            <div class="col-sm-6">
            </div>
        </div>
        <settings-form></settings-form>
    </div>
</template>

<script>
    import SettingsForm from './SettingsForm'
    export default {
        name: "setting-page",
        components: { SettingsForm },
    }
</script>

<style scoped>

</style>