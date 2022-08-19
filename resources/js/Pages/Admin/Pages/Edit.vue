<template>
    
<AppLayout>
    <div >
        <Link :href="route('admin.pages')" style="text-decoration:none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
        </svg>
        späť na zoznam stránok
        </Link>
    </div>
    <h1>Upraviť stránku</h1>
    <form @submit.prevent="form.patch(route('admin.pages.update', page))">
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
import { Link } from '@inertiajs/inertia-vue3'


export default {
    data(){
        return{
            editor: ClassicEditor,
            editorConfig: {}
        }
    },
    props: {
        page: Object
    },
    components:{
        AppLayout,
        ckeditor: ClassicEditor.component,
        Link
    },
    setup (props) {
        const form = useForm({
            title: props.page.title,
            slug: props.page.slug,
            description: props.page.description,
            body: props.page.body
        })

        return { form }
    },

    }
</script>