<template>
    <section>
        <Header></Header>
        <div v-if="advert" class="p-10 grid grid-cols-1 w-1/2 content-center">
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl">
                        <h2
                            class="text-gray-900 title-font text-lg font-medium"
                            v-text="advert.title"
                        ></h2>
                        <h2
                            class="text-gray-900 title-font text-lg font-medium"
                            v-text="formatCurrency(advert.price)"
                        ></h2>
                    </div>
                </div>
                <div class="h-1/2">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" :src="'/storage/images/' + advert.image_path">
                </div>
                <div class="px-6 pt-4 pb-2">
                    <p>{{ advert.description }}</p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <h2 class="text-gray-900 title-font text-lg font-medium mb-2">Category</h2>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ advert.category.name }}</span>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <h2 class="text-gray-900 title-font text-lg font-medium mb-2">Contact Information</h2>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ advert.contact_number }}</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ advert.contact_email }}</span>
                    <h2 class="text-gray-900 title-font text-lg font-medium mb-2">Contact Address</h2>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ advert.province }}</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ advert.city }}</span>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Header from '../Header'
    export default {
        name: "Show",

        components: {
            Header
        },
        methods: {
            formatCurrency(price) {
                return (price).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD',
                });
            }
        },
        computed: {
            adverts() {
                return this.$store.state.adverts
            },
            advert() {
                return this.adverts.find(advert => advert.slug === this.$route.params.slug)
            }
        }
    }
</script>

<style scoped>

</style>
