<template>
    <AppLayout>
        <h2>Správa od: {{ contact.email }}</h2>
        <div v-if="contact.name">
            Meno: {{ contact.name }}
        </div>
        <div>
            {{ contact.message }}
        </div>
        <div class="float-end">
            <Link :href="route('admin.contact.switchViewed', {contact: contact, onOff: !contact.viewed})" method="post" title="zobraziť" class="px-2" v-if="!contact.viewed" @click="contact.viewed = 1">
                <button class="btn btn-sm btn-info">označiť ako prečítané</button>
            </Link>
            <Link :href="route('admin.contact.switchViewed', {contact: contact, onOff: !contact.viewed})" method="post" title="zobraziť" class="px-2" v-else @click="contact.viewed = 0">
                <button class="btn btn-sm btn-secondary">označiť ako neprečítané</button>
            </Link>
            <Link :href="route('admin.contact.delete', contact)" method="delete" title="zobraziť" class="px-2" :onBefore="confirmDelete">
                <button class="btn btn-sm btn-danger">vymazať správu</button>
            </Link>
        </div>
    </AppLayout>


</template>


<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'

    export default{
        props: {
            contact: Object
        },
        components: {
            AppLayout,
            Link
        },
        methods:{
            confirmDelete(){
                if(!confirm('Skutočne chcete správu vymazať?')){
                    return false;
                }
            }
        }

    }

</script>