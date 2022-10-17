<template>
    <AppLayout>
        <h1>Kontakt</h1>
        <form @submit.prevent="recaptcha">
            <div class="row">
                <div class="col-md-3">
                    <label for="name" class="col-sm-2 col-form-label">Meno: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="name" id="name" v-model="form.name" class="form-control">
                    <div class="text-danger" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="email" class="col-sm-2 col-form-label fw-bold">Email: </label>
                </div>
                <div class="col-md-5">
                    <input type="email" name="email" id="email" v-model="form.email" class="form-control">
                    <div class="text-danger" v-if="form.errors.email">{{ form.errors.email }}</div>
                    <div class="text-danger" v-if="form.errors.captcha_token">{{ form.errors.captcha_token }}</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="message" class="col-sm-2 col-form-label fw-bold">Správa: </label>
                </div>
                <div class="col-md-5">
                    <div class="text-danger" v-if="form.errors.message">{{ form.errors.message }}</div>
                    <textarea name="text" id="message" cols="30" rows="10" class="form-control" v-model="form.message"></textarea>
                    <span v-if="form.message">{{ form.message.length }}/500</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8 text-center">
                    <button type="submit" class="btn btn-primary"> Odoslať </button>
                </div>
            </div>
        </form>
    </AppLayout>


</template>


<script>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import { useForm, usePage } from "@inertiajs/inertia-vue3";
    import { useReCaptcha } from "vue-recaptcha-v3";

    export default{
        components:{
            AppLayout,
        },
        setup () {
            const user = usePage().props.value.auth
            const form = useForm({
                name: null,
                email: user.check ? user.user.email : null,
                message: null,
                captcha_token :null,
            })

            const { executeRecaptcha, recaptchaLoaded } = useReCaptcha()
            const recaptcha = async () => {
                await recaptchaLoaded()
                form.captcha_token = await executeRecaptcha('login')
                submit();
            }

            function submit() {
            form.post(route('contact'), {
                preserveScroll: true,
                onSuccess: () => console.log('success'),
            })
            }

            return {
                form, submit ,recaptcha,
            }
            
        }

    }

</script>