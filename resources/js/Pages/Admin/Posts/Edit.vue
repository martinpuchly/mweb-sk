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
            text: props.post.text,
            published: props.post.published == 1 ? true : false,
            published_at: props.post.published_at,
            description: props.post.description,
            keywords: props.post.keywords,
        })

        return { form }
    },

    }
</script>