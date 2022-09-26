<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';
import BreezeLabel from '@/Components/Label.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AppLayout>
        <Head title="Register" />
        <h1>Registrácia</h1>
        <form @submit.prevent="submit">


            <div class="col-5">
                <div class="form-group">
                        <label for="name" class="form-label">Prihlasovacie meno:</label>
                        <input type="text" name="name" id="name" class="form-control" v-model="form.name">
                        <BreezeInputError class="mt-2 text-danger" :message="form.errors.name" />
                </div>
                <div class="form-group mt-3">
                        <label for="email" class="form-label">Emailová adresa:</label>
                        <input type="text" name="email" id="email" class="form-control" v-model="form.email">
                        <BreezeInputError class="mt-2 text-danger" :message="form.errors.email" />
                </div>
                <div class="form-group mt-3">
                        <label for="password" class="form-label">Heslo:</label>
                        <input type="password" name="password" id="password" class="form-control" v-model="form.password">
                        <BreezeInputError class="mt-2 text-danger" :message="form.errors.password" />
                </div>
                <div class="form-group mt-3">
                        <label for="password_confirmation" class="form-label">Potvrdenie hesla:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" v-model="form.password_confirmation">
                        <BreezeInputError class="mt-2 text-danger" :message="form.errors.password_confirmation" />
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mt-4">Registrovať </button>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
