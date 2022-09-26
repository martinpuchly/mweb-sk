<template>
    <div>
        <div class="mb-3 row col-5">
            <label for="title" class="col-sm-2 col-form-label">Titulok: </label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" v-model="form.title" class="form-control">
                <div class="text-danger" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="tags" class="col-sm-2 col-form-label">Tagy: </label>
            <div class="col-sm-10">
                <input type="text" name="tags" id="tags" v-model="form.tags" class="form-control">
                <div class="text-danger" v-if="form.errors.tags">{{ form.errors.tags }}</div>
            </div>
        </div>
        <div class="mb-3 row col-12">
            <label for="intro" class="col-sm-2 col-form-label">Úvod článku | Kráty článok: </label>
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