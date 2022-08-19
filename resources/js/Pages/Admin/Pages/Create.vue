<template>
    
<AppLayout>
    <h1>Vytvoriť stránku</h1>
    <form @submit.prevent="form.post(route('admin.pages.create'))">
        <div class="mb-3 row col-5">
            <label for="title" class="col-sm-2 col-form-label">Názov: </label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" v-model="form.title" class="form-control">
                <div class="text-danger" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="slug" class="col-sm-2 col-form-label">Url: </label>
            <div class="col-sm-10">
                <input type="text" name="slug" id="slug" v-model="form.slug" class="form-control">
                <div class="text-danger" v-if="form.errors.slug">{{ form.errors.slug }}</div>
            </div>
        </div>
            <div class="mb-3 row col-5">
            <label for="description" class="col-sm-2 col-form-label">Popis: </label>
            <div class="col-sm-10">
                <input type="text" name="description" id="description" v-model="form.description" class="form-control">
                <div class="text-danger" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>
        </div>
            <div class="mb-3 row col-12">
            <label for="description" class="col-sm-2 col-form-label">Stránka: </label>
            <div class="text-danger" v-if="form.errors.body">{{ form.errors.body }}</div>
            <div class="col-12">
                <ckeditor :editor="editor" v-model="form.body" :config="editorConfig"></ckeditor>
            </div>
        </div>
        <button class="btn btn-primary"> Uložiť </button>
      
     </form>
     </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


export default {
    data(){
        return{
            editor: ClassicEditor,
            editorConfig: {}
        }
    },
    props: {
        page: Object,
    },
    components:{
        AppLayout,
        ckeditor: ClassicEditor.component
    },
    setup () {
        const form = useForm({
            title: null,
            slug: null,
            description: null,
            body: ""
        })

        return { form }
    },

    }
</script>