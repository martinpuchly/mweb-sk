<template>
    <AppLayout>
        <section>
            <h1>mWeb.sk</h1>
            <div class="bg-gray-200 pt-3 px-5 rounded-xl mb-10 pb-5">
                <div class="text-4xl font-semibold py-3">Ahoj.</div>
                <p>
                    Tento web je pomyselné portfólio na ktorom by som chcel odprezentovať vedomosti, skúsenosti v oblasti programovania a 
                    vzhľadom na to, že neskromne predpokladmám že už niečo aj viem, tak by som chcel pridať aj nejaké návody.
                </p>
                <p class="mt-3">
                    Venujem sa tvorbe webvých stránok. Väčšinou využívam webframework <strong>Laravel (PHP)</strong> v ktorom pracujem (ak je toto moje hranie práca) už od verzie 5.
                    Od štandardného blade layoutu som prešiel k <strong>Inertia.js</strong> a <strong>Vue.js</strong> aby som ako tak držal krok s dobou. Aký/taký <strong>JavaScript</strong> musí byť. Základy <strong>Bootstrap</strong> a <strong>Tailwind</strong> by tiež boli. 
                </p>
                <p class="mt-3">
                    Musím sa priznať (aj keď za to budem odsúdený), že sa mi veľmi páči jazyk <strong>Ruby</strong> a web framework <strong>Ruby on Rails</strong>. Tento jazyk má funkciu asi na všetko.
                    A Rails je skvelý, ale bohužiaľ popularita týchto technológií klesá a na Slovensku sa vyžívajú minimálne. Preto som ostal primárne na PHP.
                </p>
                <p class="mt-3">
                    Túto verziu stránky som vytváral aj v <strong>Python</strong>(e) vo webframeworku <strong>Django</strong>, prípadne som v si v tomto jazyku vytváral rôzne scripty vzhľadom na nekonečné knižnice pre tento jazyk.
                    Webscraping a náhrávanie údajov do DB, rýchla úprava rozlíšení fotiek a iné minivecičky. Viac nájdete v tomto linku: 
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