<template>
    
<AppLayout>
    <article>
        <header class=" mb-4">
            <div class="float-end">
                <Link :href="route('post.like', post)" method="PUT" title="páči sa mi článok" class="px-2">
                <button type="button" class="btn btn-primary text-white">
                        Páči sa mi článok
                        <span class="badge text-bg-secondary mx-2">{{ post.likes }}</span>
                    </button>
                </Link>   
            </div>
            <h1 class="m-0">{{ post.title }}</h1>
            <div class="text-secondary">napísal  {{ post.user.name }} dňa </div>
        </header>
        <main>
            <section v-html="post.intro"></section>
            <section v-if="!!post.text && post.text.lenght>20" v-html="post.text"></section>
        </main>
        <footer>
            Footer
        </footer>
    </article>
     </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';


export default {
    data(){
        return{
        }
    },
    props: {
        post: Object,
    },
    components:{
        AppLayout,    
        Link
    },
    setup () {
        const form = useForm({

        })

        return { form }
    },

    }
</script>

<style> /* don't add "scoped"; note that this will also globalize the CSS for all editors in your project */
.ck-editor .ck-editor__main .ck-content {
    min-height: 500px;
}
</style>