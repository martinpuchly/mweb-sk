<template>
<div>
    <div>
        <label class="form-label" id="text">Text vtipu:</label>
        <textarea id="text" class="form-control" style="min-height: 10rem" v-model="form.text"></textarea>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-primary mt-5">Uložiť</button>
    </div>

</div>        

</template>


<script setup>    
    const props = defineProps({
        form: Object,
        errors: Object,
    })

</script>