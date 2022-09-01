<template>
    
<AppLayout>
    <h1>Pridať rýchlu novinku</h1>
    <form @submit.prevent="form.post(route('admin.quicknews.create'))">
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
    setup () {
        const form = useForm({
            title: null,
            text: null,
        })

        return { form }
    },

    }
</script>