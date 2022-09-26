<template>
    <div class="mb-3 row col-10">
        <label for="title" class="col-sm-2 col-form-label">Titulok: </label>
        <div class="col-sm-10">
            <input type="text" name="title" id="title" v-model="form.title" class="form-control">
            <div class="text-danger" v-if="form.errors.title">{{ form.errors.title }}</div>
        </div>
    </div>
    <div class="mb-3 row col-10">
        <label for="text" class="col-sm-2 col-form-label">Text článku: </label>
        <div class="col-sm-10">
            <textarea v-model="form.text" class="form-control"></textarea>
            <div class="text-danger" v-if="form.errors.text">{{ form.errors.text }}</div>
        </div>
    </div> 
    <button class="btn btn-primary"> Uložiť </button>
</template>


<script>

    export default{
        props: {
            form: Object
        }

    }

</script>


<style> /* don't add "scoped"; note that this will also globalize the CSS for all editors in your project */
    .ck-editor .ck-editor__main .ck-content {
        min-height: 500px;
    }
</style>