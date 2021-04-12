<template>
    <nav class="flex items-center justify-between flex-wrap bg-white py-4 shadow w-full bg-red-600">
        <div class="flex justify-between lg:w-auto w-full lg:border-b-0 pl-6 pr-2 border-solid border-b-2 border-gray-300 pb-5 lg:pb-0">
            <div class="flex items-center flex-shrink-0 text-gray-800 mr-16">
                <router-link to="/">
                    <span class="font-semibold text-xl text-white tracking-tight">Marketplace.com</span>
                </router-link>
            </div>
        </div>
        <div class="menu w-full lg:block  lg:flex lg:items-center lg:w-auto lg:px-3 px-8">
            <div class="flex">
                <router-link
                    :to="{name: 'adverts.create'}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 ml-2 mt-4 lg:mt-0 rounded">
                    Post Free Ad
                </router-link>
            </div>
            <div class="flex">
                <router-link
                    v-if="isLoggedin"
                    to="/logout"
                    @click.native="logout"
                    class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 ml-2 mt-4 lg:mt-0 rounded">
                    Logout
                </router-link>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Header",
        computed: {
            isLoggedin() {
                return localStorage.getItem('auth')
            }
        },
        methods: {
            logout() {
                axios.post('/api/logout').then(() => {
                    localStorage.removeItem("auth")
                    this.$router.push({ name: "adverts.index"});
                }).catch((error) =>{
                    this.errors = error.response.data.errors;
                })
            }
        }
    }
</script>

<style scoped>

</style>
