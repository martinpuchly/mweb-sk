<template>
    <AppLayout>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><Link :href="route('admin')">Admin</Link></li>
                    <li class="breadcrumb-item"><Link :href="route('admin.contacts')">Kontakty</Link></li>
                </ol>
            </nav>
            <h1>Správa:</h1>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="text-green-900 font-bold text-xl">Email: </div>
                <div class="text-xl">{{ contact.email }}</div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="text-green-900 font-bold text-xl">Správa: </div>
                <div class="text-xl italic">{{ contact.text }}</div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 mt-20">
                <div class="text-green-900 font-bold text-xl">Status správy: </div>
                <div>
                    <select class="form-select" v-model="form.status" @change.prevent="saveStatus()">
                        <option v-for="(status, index) in statuses" :value="index">{{ status }}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 mt-5">
                <div class="text-green-900 font-bold text-xl">Vymazať správu: </div>
                <div class="">
                   <Link @click.prevent="del(contact.id)" class="btn btn-danger">Vymazať správu</Link>
                </div>
            </div>
    </AppLayout>
</template>




<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Link, router, useForm } from '@inertiajs/vue3'


    const props = defineProps({
        contact: Object,
        statuses: Array,
    })


    const form = useForm({
        status: props.contact.status,
    })

    function saveStatus() {
        form.patch(route('admin.contact.saveStatus', {contact: props.contact.id}))
    }

    function del(id) {
        if(confirm(`Skutočne chcete vymazať túto správu?`)){
            router.delete(route('admin.contact.delete', {contact: props.contact.id}))

        }
    }

</script>
