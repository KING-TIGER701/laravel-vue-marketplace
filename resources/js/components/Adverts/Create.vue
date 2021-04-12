<template>
    <div>
        <Header></Header>
        <div class="py-8">
            <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="name" class="block mb-2 font-medium text-sm text-gray-700">Ad title</label>
                                <input
                                    id="title"
                                    name="title"
                                    class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    placeholder="Type your ad title"
                                    v-model="title"
                                />
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="description" class="block mb-2 font-medium text-sm text-gray-700">Description</label>
                                <textarea
                                    id="description"
                                    name="description"
                                    placeholder="Type a detailed description between 30 and 3000 characters"
                                    class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    v-model="description"
                                >
                            </textarea>
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="category" class="block mb-2 font-medium text-sm text-gray-700">Category</label>
                                <select
                                    class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                                    id="category_id"
                                    name="category_id"
                                    v-model="selected_category_id"
                                >
                                    <option selected disabled value="">Please select category</option>
                                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>

                                </select>
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="designer" class="block mb-2 font-medium text-sm text-gray-700">Province</label>
                                <input
                                    id="province"
                                    name="province"
                                    class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    v-model="province"
                                />
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="designer" class="block mb-2 font-medium text-sm text-gray-700">City</label>
                                <input
                                    id="city"
                                    name="city"
                                    class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    v-model="city"
                                />
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="price" class="block mb-2 font-medium text-sm text-gray-700">Contact Number</label>
                                <input
                                    id="contact_number"
                                    name="contact_number"
                                    class="w-1/2 bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    v-model="contact_number"
                                />
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="price" class="block mb-2 font-medium text-sm text-gray-700">Contact Email</label>
                                <input
                                    id="contact_email"
                                    name="contact_email"
                                    class="w-1/2 bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    v-model="contact_email"
                                />
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="price" class="block mb-2 font-medium text-sm text-gray-700">Price</label>
                                <input
                                    id="price"
                                    name="price"
                                    class="w-1/2 bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2"
                                    placeholder="e.g 300"
                                    v-model="price"
                                />
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6 mb-4">
                                <label for="image" class="block mb-2 font-medium text-sm text-gray-700">Ad Image</label>
                                <input type="file" name="image" @change="onFileSelected" class="mb-6" accept="image/* ">
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button @click.prevent="saveForm"
                                        type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 ml-2 mt-4 lg:mt-0 rounded">
                                    Post Ad
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from '../Header'
    export default {
        name: "Create.vue",
        data() {
            return {
                'title': '',
                'description': '',
                'province': '',
                'city': '',
                'contact_number': '',
                'contact_email': '',
                'price': '',
                form: new FormData(),
                errors: [],
                selected_category_id: ''
            }
        },
        components: {
            Header
        },
        computed: {
            categories() {
                return this.$store.state.categories;
            },
        },
        methods: {
            saveForm() {
                this.form.append('title', this.title)
                this.form.append('description', this.description)
                this.form.append('province', this.province)
                this.form.append('city', this.city)
                this.form.append('contact_number', this.contact_number)
                this.form.append('contact_email', this.contact_email)
                this.form.append('price', this.price)
                this.form.append('selected_category_id', this.selected_category_id)

                axios.post('/api/adverts', this.form).then(() => {
                }).catch((error) => {
                    this.errors = error.response.data.errors;
                })
            },
            onFileSelected(event) {
                let image = event.target.files[0]
                this.form.append('image', image)
            }
        }
    }
</script>

<style scoped>

</style>
