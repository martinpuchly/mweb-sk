<template>
    <AppLayout>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><Link :href="route('admin')">Admin</Link></li>
                    <li class="breadcrumb-item"><Link :href="route('admin.jokes')">Vtipy</Link></li>
                </ol>
            </nav>
        <h2 class="mb-3">Upraviť vtip:</h2>
        <form @submit.prevent="submit" >
            <Form :form="form" :errors="errors"></Form> 
        </form>
    </AppLayout>

    <Head title="vytvoriť článok"></Head>


</template>


<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { useForm, Head, Link } from '@inertiajs/vue3'
    import Form from './Form.vue';

    const props = defineProps({
        joke: Object,
        errors: Object
    })

    const form = useForm({
        text: props.joke.text,
    })


    function submit() {
        form.patch(route('admin.joke.edit', {joke: props.joke.id}));
    }





</script>
