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
                <QuillEditor theme="snow" :toolbar="toolbarOptions" v-model:content="form.intro" :modules="modules"  contentType="html"  style="min-height:25rem"/>
            </div>
        </div>
        <div class="mb-3 row col-12 mt-5">
            <label for="text" class="col-sm-2 col-form-label">Text článku: </label>
            <div class="text-danger" v-if="form.errors.text">{{ form.errors.text }}</div>
            <div class="col-12">
                <QuillEditor theme="snow" :toolbar="toolbarOptions" v-model:content="form.text" :modules="modules"  contentType="html"  style="min-height:25rem"/>
            </div>
        </div>
        <div class="mb-3 row col-12 mt-5">
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
    import { QuillEditor } from '@vueup/vue-quill';
    import '@vueup/vue-quill/dist/vue-quill.snow.css';
    import ImageUploader from 'quill-image-uploader';
    import axios from 'axios';

    
    export default{
        props:{
            form: Object
        },
        components:{
            QuillEditor
        },
        setup: () => {
            const modules = {
                name: 'imageUploader',
                module: ImageUploader,
                options: {
                upload: file => {
                    return new Promise((resolve, reject) => {
                    const formData = new FormData();
                    formData.append("image", file);

                    axios.post('/admin/stranky/uploadimage', formData)
                    .then(res => {
                        console.log(res)
                        resolve(res.data.url);
                    })
                    .catch(err => {
                        reject("Upload failed");
                        console.error("Error:", err)
                    })
                    })
                }
            }
            }
            return { modules }
        },
        data(){
            return{
                toolbarOptions: [
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                            [{ 'align': [] }],
                            ['blockquote', 'code-block', 'image', 'video'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                            [{ 'direction': 'rtl' }],                         // text direction
                            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                            ['clean']                                         // remove formatting button
                        ]
            }
        }
    }
</script>