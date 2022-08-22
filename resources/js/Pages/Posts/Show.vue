<template>
    
<AppLayout>
    <article>
        <header class=" mb-4">
            <div class="float-end">
                <Link :href="route('post.like', post)" method="PUT" title="páči sa mi článok" class="px-2" as="button">
                <button type="button" class="btn btn-primary text-white">
                        Páči sa mi článok
                        <span class="badge text-bg-secondary mx-2">{{ post.likes }}</span>
                    </button>
                </Link>   
            </div>
            <h1 class="m-0">{{ post.title }}</h1>
            <div class="text-secondary">uverejnil  {{ post.user.name }} {{ post.create_hum }}</div>
        </header>
        <main>
            <section v-html="post.intro"></section>
            <section v-if="!!post.text && post.text.lenght>20" v-html="post.text"></section>
        </main>
        <footer>
            <div class="float-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                    <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                    <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
                </svg>
                <Link :href="route('posts', tag)" v-for="tag in tagsArr" :title="tag" class="px-2">
                    {{ tag }}, 
                </Link>
            </div>
            <div class="float-end pr-4" v-if="!!$page.props.auth.user && $page.props.auth.user.is_admin">
                 <Link :href="route('admin.posts.update', post)" title="upraviť" class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    upraviť článok
                </Link>
            </div>
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
        tagsArr: Object,
        is_liked: Boolean
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