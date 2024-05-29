<template>
    <AppLayout>
        <section>
            <div class="bg-gray-700 pt-3 px-5 rounded-xl mb-10 pb-5">
               {{ title_head.body }}
            </div>
        </section>
        <section>
            <h2 class="underline my-5">Najnovší článok</h2>
            <PostBlock  v-for="post in posts" :key="post.id" :post="post" v-if="posts.length" class="border-b-2 mb-4"></PostBlock>
            <div v-else>Zatiaľ nemáme žiadne články.</div>
        </section>
    
    </AppLayout>

    <Head>
        <meta name="description" content="domovská stránka webu mWeb.sk">
    </Head>


</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Head, Link } from '@inertiajs/vue3'
    import PostBlock from '../Posts/PostBlock.vue';

    const props = defineProps({
       posts: Object,
       title_head: Object
    })


</script>

<style scoped>
    #port_link:hover {
        position: relative;
        left: 0px
    }


</style>