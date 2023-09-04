<template>
    <AppLayout>
        <section>
            <div class="bg-gray-200 pt-3 px-5 rounded-xl mb-10 pb-5">
                <h1>mWeb.sk</h1>
                <p>
                    Táto stránka je pomyselné portfólio na ktorom by som chcel ukázať vedomosti, skúsenosti v oblasti programovania. Aj keď sa tým neživím, venujem sa tomu už pomerne dlho a tak pridám aj nejaké články, dojmy a hodnotenia ktoré môžno niekomu na začiatku pomôžu. Ak nepomôžu tak si aspoň rozcvičím mozgové závity písaním.
                </p>
                <p>
                    Čo sa týka programovania tak sa venujem primárne tvorbe webových stránok. Rád skúšam nové technológie a aj preto nie je toho moc za tie roky online. Kým dokončím projekt, už ma ťahá niečo iné, nové. 
                </p>
                <p> 
                    Väčšinou používam webframework <strong>Laravel (PHP)</strong> v ktorom sa hrajkám už od verzie 5. Od štandardného blade layoutu som prešiel k <strong>Inertia.js</strong> a <strong>Vue.js</strong> aby som ako tak držal krok s dobou. Aký/taký <strong>JavaScript</strong> musí byť. 
                </p>
                <p>
                    Najsympatickejší mi je programovací jazyk <strong>Ruby</strong> a web framework <strong>Ruby on Rails</strong>. Páči sa mi syntax a rád by som v ňom vytváral viac, ale svet valcuje podobný, za mňa menej prívetivý jazyk <strong>Python</strong>. Nekonečné množstvo knižníc je ale dostatočné plus a na niektoré vecičky som Python využíval.
                </p>
                <p class="mt-3 text-center text-3xl py-5">
                    <Link :href="route('page', {page_slug: 'portfolio'})">PORTFÓLIO</Link>
                </p>
            </div>
        </section>
        <section>
            <h2 class="underline my-5">Najnovšie články</h2>
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
       posts: Object
    })

</script>