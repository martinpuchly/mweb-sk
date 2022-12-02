<template>
    <div>
        <div class="mb-3 row col-5">
            <label for="title" class="col-sm-3 col-form-label">Názov: </label>
            <div class="col-sm-9">
                <input type="text" name="title" id="title" v-model="form.title" class="form-control">
                <div class="text-danger" v-if="form.errors.title">{{ form.errors.title }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="slug" class="col-sm-3 col-form-label">Url: </label>
            <div class="col-sm-9">
                <input type="text" name="slug" id="slug" v-model="form.slug" class="form-control">
                <div class="text-danger" v-if="form.errors.slug">{{ form.errors.slug }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="description" class="col-sm-3 col-form-label">Popis: </label>
            <div class="col-sm-9">
                <input type="text" name="description" id="description" v-model="form.description" class="form-control">
                <div class="text-danger" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>
        </div>
        <label class="col-sm-3 col-form-label">Meta: </label>
        <div class="mb-3 row col-5">
            <label for="meta_description" class="col-sm-3 col-form-label">Description: </label>
            <div class="col-sm-9">
                <input type="text" name="meta_description" id="meta_description" v-model="form.meta_description" class="form-control">
                <div class="text-danger" v-if="form.errors.meta_description">{{ form.errors.meta_description }}</div>
            </div>
        </div>
        <div class="mb-3 row col-5">
            <label for="meta_keywords" class="col-sm-3 col-form-label">Keywords: </label>
            <div class="col-sm-9">
                <input type="text" name="meta_keywords" id="meta_keywords" v-model="form.meta_keywords" class="form-control">
                <div class="text-danger" v-if="form.errors.meta_keywords">{{ form.errors.meta_keywords }}</div>
            </div>
        </div>
        <div class="mb-3 row col-12">
            <label for="body" class="col-sm-2 col-form-label">Stránka: </label>
            <div class="text-danger" v-if="form.errors.body">{{ form.errors.body }}</div>
            <div class="col-12">
                <QuillEditor theme="snow" :toolbar="toolbarOptions" v-model:content="form.body" :modules="modules"  contentType="html"  style="min-height:25rem"/>
            </div>
        </div>
        <div class="mt-5">
            <button class="btn btn-primary" @click="hu()"> Uložiť </button>
        </div>
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
