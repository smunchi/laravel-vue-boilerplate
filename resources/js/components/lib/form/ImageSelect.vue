<template>
    <div class="image-select-section">
        <ul class="nav" v-if="images.length > 0">
            <li class="nav-item" v-for="image in images">
                <div @click="selectedImage(image)"
                     :class="{active: activeID === image.id,swing:activeID === image.id}"
                     :style="{margin: margin}"
                     class="img-thumbnail p-10">
                    <img :src="'/' + image.src"
                         :width="width"
                         :height="height"
                         class="img-fluid"
                         alt="">
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import client from '@/client'
    export default {
        name: "image-select",
        props: {
            width: {
                type: String,
                required: false,
                default: 'auto'
            },
            height: {
                type: String,
                required: false,
                default: 'auto'
            },
            margin: {
                type: String,
                required: false,
                default: '0.5rem'
            },
            value: {
                required: false
            }

        },
        data (){
            return {
                activeID: '',
                images: [],
            }
        },
        watch: {
            value() {
                this.images.forEach( (image) => {
                    if (image.src == this.value){
                        this.activeID = image.id
                    }
                })
            }
        },
        mounted (){
            this.fetchBucketColors()
        },
        methods: {
            selectedImage (image){
                this.activeID = image.id
                this.$emit('input', image.src)
            },
            fetchBucketColors (){
                client.get('/admin/api/buckets/colors')
                    .then(response => {
                        this.images = response.data
                    });
            },
        }
    }
</script>

<style scoped>
    .nav-item div {
        border: 2px solid transparent;
    }
    .nav-item div.active {
        border: 2px solid #0a4d8c;
    }
</style>