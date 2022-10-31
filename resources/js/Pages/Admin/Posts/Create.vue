<template>
    
<AppLayout>
    <h1>Vytvoriť článok</h1>
    <form @submit.prevent="form.post(route('admin.posts.create'))">
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
        post: Object,
    },
    components:{
        AppLayout,
        Form
    },
    setup () {
        const form = useForm({
            title: null,
            tags: null,
            intro: "",
            text: "",
            published: false,
            published_at: null,
            description: null,
            keywords: null,
        })

        return { form }
    },

    }
</script>
