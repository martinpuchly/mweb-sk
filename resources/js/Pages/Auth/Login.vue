<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import BreezeInputError from '@/Components/InputError.vue';
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AppLayout>
        <Head title="prihlásiť sa" />
        <h1>Prihlásiť</h1>
        <form @submit.prevent="submit">
        <div class="col-md-5">
            <div class="form-group">
                    <label for="email" class="form-label">Emailová adresa:</label>
                    <input type="text" name="email" id="email" class="form-control" v-model="form.email">
                    <BreezeInputError class="mt-2 text-danger" :message="form.errors.email" />

            </div>
            <div class="form-group mt-3">
                    <label for="password" class="form-label">Heslo:</label>
                    <input type="password" name="password" id="password" class="form-control" v-model="form.password">
                    <BreezeInputError class="mt-2 text-danger" :message="form.errors.password" />

            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label ml-3"> zapamätať si prihlásenie</label>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary mt-4">Prihlásiť </button>
            </div>
        </div>
        </form>
    </AppLayout>
</template>
