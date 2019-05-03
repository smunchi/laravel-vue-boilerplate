<template>
    <transition name="fade">
    <section class="rh_modal">
        <div class="rh_modal_bg" @click="modalClose"></div>
        <div class="rh_modal_content bgc-white bd bdrs-3"
            :class="customClass">
            <div class="rh_modal_header">
                <slot name="header"></slot>
                <button type="button"
                    class="btn btn-default rh_modal_close"
                    @click="modalClose">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="rh_modal_body">
                <slot name="body"></slot>
            </div>
            <div class="rh_modal_footer">
                <slot name="footer"></slot>
            </div>
        </div>
    </section>
    </transition>
</template>

<script>
    import {EventBus} from "@/event-bus";

    export default {
        name: "modal",
        props: {
            defaultClass: {
                type: Boolean,
                required: false,
                default: true
            },
            customClass: {
                type: String,
                required: false
            }
        },
        methods: {
            modalClose() {
                EventBus.$emit("modalClose");
            }
        }
    }
</script>

<style scoped>

</style>