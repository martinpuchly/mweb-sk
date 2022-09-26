<template>
    
<AppLayout>
    <h1>Upraviť rýchlu novinku</h1>
    <form @submit.prevent="form.patch(route('admin.quicknews.update', quicknew))">
        <Form :form="form"></Form>
     </form>
     </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Form from '../QuickNews/Form.vue';


export default {
    props: {
        quicknew: Object,
    },
    components:{
        AppLayout,
        Form
    },
    setup (props) {
        const form = useForm({
            title: props.quicknew.title,
            text: props.quicknew.text,
        })

        return { form }
    },

    }
</script>