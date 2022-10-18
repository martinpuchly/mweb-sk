<template>
    <AppLayout>
        <h2>Administrácia: Užívateľia</h2>
        <div v-if="users.data.length<1">
            Zatiaľ neboli zaregistrovaný žiadny užívatelia.
        </div>
        <table class="table table-striped" v-else>
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">meno:</th>
                    <th scope="col">email:</th>
                    <th scope="col">možnosti:</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-award-fill" viewBox="0 0 16 16" v-if="user.is_admin" title="administrátor">
                            <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                            <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                        </svg>
                    </td>
                    <td>{{ user.email }}</td>
                    <td>
                        <Link :href="route('admin.user.edit', user)" title="upraviť" class="btn btn-info btn-sm px-2 mx-2">upraviť</Link>
                        <Link :href="route('admin.user.delete', user)" method="delete" title="vymazať" class="btn btn-danger btn-sm px-2 mx-2" onclick="if(!confirm('Skutočne chcete užívateľa vymazať?')) return false;">
                           vymazať
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination  class="mt-6" :links="users.links"></pagination>
    </AppLayout>


</template>


<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination.vue'
    export default{
        props: {
            users: Object
        },
        components: {
            AppLayout,
            Link,
            Pagination
        },
        mounted(){
            console.log(this.users.data)
        }

    }

</script>