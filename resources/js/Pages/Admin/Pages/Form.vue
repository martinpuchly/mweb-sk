<template>
    <div>
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
            <label for="body" class="col-sm-2 col-form-label">Stránka: </label>
            <div class="text-danger" v-if="form.errors.body">{{ form.errors.body }}</div>
            <div class="col-12">
                <ckeditor :editor="editor" v-model="form.body" :config="editorConfig" class="ck-editor_small"></ckeditor>
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
            ckeditor: ClassicEditor.component,
        },
        data(){
        return{
            editor: ClassicEditor,
            editorConfig: {
                filebrowserUploadUrl: "{{route('admin.pages.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
            }
        }
        },
    }
</script>


<style> /* don't add "scoped"; note that this will also globalize the CSS for all editors in your project */
    .ck-editor .ck-editor__main .ck-content {
        min-height: 500px;
    }
</style>