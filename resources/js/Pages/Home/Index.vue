<template>
    
    <AppLayout>
        <div class="row">
            <div class="col-12">
                <p class="fs-4 justify-content-between lh-lg" style="text-indent:2em">
                    Vo voľnom čase sa rád venujem programovaniu. Považujem to za jeden zo svojich koníčkov a neživím sa tým. Venujem sa tomu už minimálne 10 rokov, vzhľadom na to že rád experimentujem s novými technológiami, nemám žiadny trvalý projekt na ktorom by som pracoval. Všetko končí v koši a ja začnem odznovu s niečím iným. Preto žiadne portfólio. (asi by som mal dať niečo dokopy)
                </p>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h3>Najnovšie články</h3>
                    <article v-for="post in posts" :key="post.id" class="mt-2 px-2 py-2 border rounded">
                        <Link :href="route('post', post.slug)" title="zobraziť">
                            <h4>{{ post.title }}</h4>
                        </Link>  
                        <main v-html="post.intro" class="col-12" style="text-indent:2em; "></main>
                    </article>
                </div>
                <div class="col-4 border-left" style="border-left-style: solid; border-color: rgba(34,34,70,0.5);">
                    <h3>Novinky</h3>
                </div>
            </div>
        </div>
    
    
    </AppLayout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3';
    
    export default{
        props:{
            posts: Object
        },
        components:{
            AppLayout,
            Link

    },
        }

</script>