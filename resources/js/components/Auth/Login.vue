<template>
    <div>
        <Header></Header>
        <div class="flex flex-wrap w-full justify-center items-center mt-8">
            <div class="flex flex-wrap max-w-xl">
                <div class="p-2 text-2xl text-gray-800 font-semibold"><h1>Login to your account to Continue</h1></div>
                <div class="p-2 w-full">
                    <label for="email">Your e-mail</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Email" type="email" v-model="form.email">
                    <span class="text-red-600" v-if="errors.email">
                    {{ errors.email[0]}}
                </span>
                </div>
                <div class="p-2 w-full">
                    <label for="password">Password</label>
                    <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2" placeholder="Password" type="password" v-model="form.password" name="password">
                    <span class="text-red-600" v-if="errors.password">
                    {{ errors.password[0]}}
                </span>
                </div>
                <p class="p-2 text-gray-600">Not a member yet? <span class="underline text-indigo-500"><a href="/register">Register for free</a></span></p>
                <div class="p-2 w-full mt-4">
                    <button @click.prevent="loginUser" type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    import Header from '../.././components/Header'
    export default {
        data () {
            return{
                form: {
                    email: '',
                    password: ''
                },
                errors: [],
            }
        },
        components: {
            Header
        },
        methods: {
            loginUser () {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login', this.form).then(response => {
                        localStorage.setItem("auth", "true")
                        this.$router.push({ name: "adverts.create"});

                    }).catch(err => console.log(err));
                });
            }
        }
    }
</script>
