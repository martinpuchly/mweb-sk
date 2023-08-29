<template>
    <AppLayout>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><Link :href="route('admin')">Admin</Link></li>
                <li class="breadcrumb-item"><Link :href="route('admin.pages')">Stránky</Link></li>
            </ol>
        </nav>
        <a :href="route('page', {page_slug: page.slug})" class="w-30 float-right hover:bg-gray-100 p-3 rounded-md grid justify-items-center" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <div>
                    zobraziť stránku
                </div>
        </a>
        <h2>Upraviť stránku:</h2>
        <form @submit.prevent="submit" >
            <Form :form="form" :errors="errors" :show_options="show_options"></Form> 
        </form>
    </AppLayout>

    <Head title="upraviť stránku"></Head>


</template>


<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { useForm, Head, Link } from '@inertiajs/vue3'
    import Form from './Form.vue';

    const props = defineProps({
        page: Object,
        show_options: Object,
        errors: Object
    })


    const form = useForm({
        title: props.page.title,
        slug: props.page.slug,
        body: props.page.body,
        accessLevel: props.page.accessLevel,
        description: props.page.description,
    })


    function submit() {
        form.patch(route('admin.page.edit', {page: props.page.id}))
    }





</script>
