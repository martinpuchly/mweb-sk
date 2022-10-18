<template>
    <AppLayout>
        <h1>Upraviť užívateľa: {{ user.name }}</h1>
        <form @submit.prevent="form.patch(route('admin.user.edit', user))">
            <div class="row">
                <div class="col-md-5">
                    <input type="checkbox" v-model="form.is_admin" id="is_admin" class="form-check-input mx-2">
                    <label for="is_admin">administráror</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mt-3 text-center">
                    <button class="btn btn-primary"> Uložiť </button>
                </div>
            </div>
        </form>
    </AppLayout>


</template>


<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3'

export default{
        props: {
            user: Object
        },
        components: {
            AppLayout,
            Link,
        },
        setup (props) {
            const form = useForm({
                is_admin: props.user.is_admin == 1 ? true : false,
            })
            return { form }
        }

    }

</script>