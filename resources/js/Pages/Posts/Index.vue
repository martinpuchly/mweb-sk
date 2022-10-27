<template>
    <AppLayout>
        <h1>Články</h1>
            <section v-if="posts.data.length>0">
                <article v-for="post in posts.data" :key="post.id" class="border-bottom  border-secondary mt-2 mb-5">
                    <h2>{{ post.title }}</h2>
                    <div v-html="post.intro"></div>
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                </svg>
                                Tagy: 
                            </span>
                            <span v-for="tag, index in post.tag_array" :key="index">
                                <Link :href="route('posts', tag)"  :title="'články ' + tag" class="mr-0">
                                    {{ tag }}
                                </Link>,
                            </span>
                        </div>
                        <div v-if="post.text" class="col-4 text-end">
                            <Link :href="route('post', post.slug)"  :title="'zobraziť článok ' + post.title" class="mr-0">
                            ...zobraziť celý článok...
                            </Link>
                        </div>
                    </div>
                    <footer class="float-end text-secondary">
                        uverejnené {{ post.create_hum }}
                    </footer>
                </article>
                <pagination  class="mt-6" :links="posts.links"></pagination>
            </section>
            <section v-else>
                <p class="bg-secondary p-3 rounded text-light">
                    Zataľ neboli zverejnené žiadne články. 
                    Skúste prísť niekedy inokedy. &#128522;
                </p>
            </section>
    </AppLayout>

    <Head>
        <title>{{ title }}</title>
    </Head>
</template>



<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3';
    import Pagination from '@/Components/Pagination.vue';
    
    export default{
        props: {
            posts: Object,
        },
        data() {
            return {
                title: "Články"
            }
        },
        components:{
            AppLayout,
            Link,
            Pagination,
            Head
        }
    }

</script>