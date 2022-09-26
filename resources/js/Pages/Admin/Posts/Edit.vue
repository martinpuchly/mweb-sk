<template>
    
<AppLayout>
    <h1>Upraviť článok</h1>
    <form @submit.prevent="form.patch(route('admin.posts.update', post))">
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
    setup (props) {
        const form = useForm({
            title: props.post.title,
            tags: props.post.tags,
            intro: props.post.intro,
            text: props.post.text
        })

        return { form }
    },

    }
</script>