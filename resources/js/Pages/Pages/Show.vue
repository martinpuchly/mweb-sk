<template>
    
    <AppLayout>
        <h1>{{ page.title }}</h1>
        <section v-html="page.body"></section>
        <footer style="border-top-style: solid">
            <div class="float-start fst-italic">
                <span>naposledy upravené {{ page.update_hum }}</span>
            </div>
            <div class="float-end pr-4" v-if="!!$page.props.auth.user && $page.props.auth.user.is_admin">
                 <Link :href="route('admin.pages.update', page)" title="upraviť" class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    upraviť stránku
                </Link>
            </div>
        </footer>
     </AppLayout>

     
     <Head>
        <title>{{ page.title }}</title>
        <meta head-key="description"  name="description" :content="page.meta_description" v-if="page.meta_description.length>0">
        <meta head-key="keywords"  name="keywords"  :content="page.meta_keywords" v-if="page.meta_keywords.length>0">
    </Head>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link, Head } from '@inertiajs/inertia-vue3';
export default {
    props: {
        page: Object
    },
    components:{
        AppLayout,
        Link,
        Head
    }


    }
</script>