<template>
    <AppLayout>
        <section>
            <div class="bg-gray-700 pt-3 px-5 rounded-xl mb-10 pb-5">
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
                <p class="mt-3 text-center text-3xl py-4">
                    <Link :href="route('page', {page_slug: 'portfolio'})">PORTFÓLIO</Link>
                </p>
                <h3 class="underline">Ďalšie zdroje:</h3>
                <div class="flex flex-row gap-10 md:gap-15 ml-5">
                    <div class="col"><a href="https://github.com/martinpuchly/" class="mx-2" target="_blank" alt="github martinpuchly" title="github: martinpuchly">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="48" height="48" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm2.218 18.616c-.354.069-.468-.149-.468-.336v-1.921c0-.653-.229-1.079-.481-1.296 1.56-.173 3.198-.765 3.198-3.454 0-.765-.273-1.389-.721-1.879.072-.177.312-.889-.069-1.853 0 0-.587-.188-1.923.717-.561-.154-1.159-.231-1.754-.234-.595.003-1.193.08-1.753.235-1.337-.905-1.925-.717-1.925-.717-.379.964-.14 1.676-.067 1.852-.448.49-.722 1.114-.722 1.879 0 2.682 1.634 3.282 3.189 3.459-.2.175-.381.483-.444.936-.4.179-1.413.488-2.037-.582 0 0-.37-.672-1.073-.722 0 0-.683-.009-.048.426 0 0 .46.215.777 1.024 0 0 .405 1.25 2.353.826v1.303c0 .185-.113.402-.462.337-2.782-.925-4.788-3.549-4.788-6.641 0-3.867 3.135-7 7-7s7 3.133 7 7c0 3.091-2.003 5.715-4.782 6.641z"></path>
                        </svg>
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://www.linkedin.com/in/martinpuchly/" class="mx-2" target="_blank" alt="linkedin martinpuchly" title="linkedin: martinpuchly">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
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
       posts: Object
    })

</script>