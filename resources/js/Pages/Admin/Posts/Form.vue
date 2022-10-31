<template>
    <div>
        <div class="mb-3 row col-5">
            <label for="title" class="col-sm-2 col-form-label">Titulok: </label>
            <div class="col-sm-9">
                <input type="text" name="title" id="title" v-model="form.title" class="form-control">
                <div class="text-danger" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="tags" class="col-sm-2 col-form-label">Tagy: </label>
            <div class="col-sm-9">
                <input type="text" name="tags" id="tags" v-model="form.tags" class="form-control">
                <div class="text-danger" v-if="form.errors.tags">{{ form.errors.tags }}</div>
            </div>
        </div>
        <label class="col-sm-3 col-form-label">Meta: </label>
        <div class="mb-3 row col-5">
            <label for="keywords" class="col-sm-3 col-form-label">Keywords: </label>
            <div class="col-sm-9">
                <input type="text" name="tags" id="tags" v-model="form.keywords" class="form-control">
                <div class="text-danger" v-if="form.errors.keywords">{{ form.errors.keywords }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="description" class="col-sm-3 col-form-label">Descritpion: </label>
            <div class="col-sm-9">
                <input type="text" name="description" id="tags" v-model="form.description" class="form-control">
                <div class="text-danger" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>
        </div>
        <div class="mb-3 row col-12">
            <label for="intro" class="col-sm-3 col-form-label">Úvod článku | Kráty článok: </label>
            <div class="text-danger" v-if="form.errors.intro">{{ form.errors.intro }}</div>
            <div class="col-12">
                <ckeditor :editor="editor" v-model="form.intro" :config="editorConfig" class="ck-editor_small"></ckeditor>
            </div>
        </div>
        <div class="mb-3 row col-12">
            <label for="text" class="col-sm-2 col-form-label">Text článku: </label>
            <div class="text-danger" v-if="form.errors.text">{{ form.errors.text }}</div>
            <div class="col-12">
                <ckeditor :editor="editor" v-model="form.text" :config="editorConfig" class="ck-editor_small"></ckeditor>
            </div>
        </div>
        <div class="mb-3 row col-12">
            <label for="published_at" class="col-sm-2 col-form-label">Publikovanie: </label>
            <div class="col-sm-5">
                <input type="datetime-local" name="published_at" id="published_at" v-model="form.published_at" class="form-control">
                <div class="text-danger" v-if="form.errors.published_at">{{ form.errors.published_at }}</div>
            </div>
            <div class="col-sm-5">
                <label for="published" class="col-form-label inline-block">
                    <input type="checkbox" name="published" id="published" v-model="form.published" class="form-control-checkbox inline-block">
                    publikovať ihneď
                 </label>
                <div class="text-danger" v-if="form.errors.published">{{ form.errors.published }}</div>
            </div>
        </div>
        <button class="btn btn-primary"> Uložiť </button>
    </div>
</template>


<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default{
        props:{
            form: Object
        },
        components:{
            ckeditor: ClassicEditor.component
        },
        data(){
            return{
                editor: ClassicEditor,
                editorConfig: {}
            }
        },


    }
</script>



<style> /* don't add "scoped"; note that this will also globalize the CSS for all editors in your project */
    .ck-editor .ck-editor__main .ck-content {
        min-height: 500px;
    }
</style>