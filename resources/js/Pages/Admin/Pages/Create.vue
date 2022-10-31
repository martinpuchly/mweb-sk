<template>
    
<AppLayout>
    <h1>Vytvoriť stránku</h1>
    <form @submit.prevent="form.post(route('admin.pages.create'))">
        <Form :form="form"></Form>
     </form>
     </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Form from './Form.vue';
export default {
    props: {
        page: Object,
    },
    components:{
        AppLayout,
        Form
    },
    setup () {
        const form = useForm({
            title: null,
            slug: null,
            description: null,
            body: "",
            meta_description: null,
            meta_keywords: null
        })

        return { form }
    },

    }
</script>