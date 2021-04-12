<template>
    <div>
        <Header></Header>
        <div class="flex items-center justify-between flex-wrap bg-white py-4 shadow w-full bg-red-700">
            <div class="container px-5 mx-auto">
                <h2 v-if="adverts.length" class="text-2xl text-white mb-2">{{adverts.length}} items for sale, Search Now.. </h2>
                <div class="mt-5 md:mt-0 md:col-span-2 mt-2">
                    <form action="" method="post">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-blue-600 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <select id="country" name="country" autocomplete="country"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:border-indigo-500 sm:text-sm"
                                                v-model="form.selected_category"
                                        >
                                            <option selected disabled value="">Search by category</option>
                                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>

                                        </select>

                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <select id="area" name="country" autocomplete="country"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:border-indigo-500 sm:text-sm"
                                                v-model="form.selected_area"
                                        >
                                            <option selected disabled value="">Search by area</option>
                                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                        </select>

                                    </div>
                                    <div>
                                        <input placeholder="Search by title..."
                                               class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:border-indigo-500 sm:text-sm"
                                               v-model="form.title"
                                        >
                                    </div>
                                    <div>
                                        <button
                                            type="submit"
                                            @click.prevent="search"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-green-500 text-white tracking-tight rounded-md sm:text-sm"
                                        >
                                            Search for items
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section class="text-gray-700 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div
                        class="lg:w-1/4 md:w-1/2 p-4 w-full mb-4"
                        v-for="advert in adverts"
                        :key="advert.id"
                    >
                        <router-link
                            class="block relative h-48 rounded overflow-hidden"
                            :to="{name: 'adverts.show', params: {slug: advert.slug}}"
                        >
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" :src="'/storage/images/' + advert.image_path">
                        </router-link>
                        <div class="mt-4">
                            <h2
                                class="text-gray-900 title-font text-lg font-medium"
                                v-text="advert.title"
                            ></h2>
                            <span class="inline-block font-semibold text-gray-700 mr-2 mb-2">{{ formatCurrency(advert.price) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-show="adverts.length === 0" class="items center text-center text-4xl mt-8">
                <h2>Opps!... Your Search <span class="font-bold">{{ form.title}}</span> did not match any records</h2>
            </div>
        </section>
    </div>
</template>

<script>
    import Header from '../Header'
    export default {
        components: {
            Header,
        },
        data() {
            return {
                form: {
                    selected_category: '',
                    selected_area: '',
                    title: '',
                },
            }
        },
        mounted: function () {
            this.adverts = this.$store.state.adverts;
            return this.adverts
        },

        methods: {
            formatCurrency(price) {
                return (price).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD',
                });
            },
            search() {
                axios.post('/api/search', this.form).then((response) => {
                    this.$store.state.adverts = response.data
                })
            },
        },
        computed: {
            categories() {
                return this.$store.state.categories;
            },
            adverts() {
                return this.$store.state.adverts;
            }
        }
    }
</script>


