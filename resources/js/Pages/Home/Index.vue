<template>
    
    <AppLayout>
        <div class="row">
                <div class="col-lg-8">
                    <h3>Najnovšie články</h3>
                    <article v-for="post in posts" :key="post.id" class="mt-2 px-2 py-2 border rounded">
                        <Link :href="route('post', post.slug)" title="zobraziť">
                            <h4>{{ post.title }}</h4>
                        </Link>  
                        <main v-html="post.intro" class="col-12" style="text-indent:2em; "></main>
                        <div class="text-end" v-if="post.text">
                            <Link :href="route('post', post.slug)"  :title="'zobraziť článok ' + post.title" class="mr-0">
                            ...zobraziť celý článok...
                            </Link>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 border-left" style="border-left-style: solid; border-color: rgba(34,34,70,0.5);">
                    <h3 class="mt-lg-0 mt-5">Novinky</h3>
                    <div class="card mt-2" v-for="quicknew in quicknews" :key="quicknew.id">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted" v-if="quicknew.title">{{ quicknew.title }}</h6>
                            <div class="card-text">{{ quicknew.text }}</div>
                            <div class="float-end fst-italic text-secondary"><small>{{ quicknew.create_hum }}</small></div>
                        </div> 
                    </div>
                </div>
            </div>
    </AppLayout>
    <Head>
        <title>Domov</title>
    </Head>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3';
    
    export default{
        props:{
            posts: Object,
            quicknews: Object
        },
        components:{
            AppLayout,
            Link,
            Head

    },
        }

</script>