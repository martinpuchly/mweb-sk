<template>
    <AppLayout>
        <h2>Administrácia: Správy</h2>
        <div v-if="contacts.length<1">
            Zatiaľ neboli pridané žiadne stránky.
        </div>
        <div v-else>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">email:</th>
                        <th scope="col">správa:</th>
                        <th scope="col">možnosti:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="contact in contacts.data" :key="contact.id">
                        <td>{{ contact.id }}</td>
                        <td>{{ contact.email }}</td>
                        <td>{{ contact.message }}</td>
                        <td>
                            <Link :href="route('admin.contact.show', contact.id)" title="zobraziť" class="px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </AppLayout>


</template>


<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'

    export default{
        props: {
            contacts: Object
        },
        components: {
            AppLayout,
            Link
        }

    }

</script>