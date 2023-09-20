<template>
    <div class="container mx-auto">
        <header class="border-b-2  relative">
            <Link :href="route('/')">
                <div class="text-green-100 text-4xl sm:text-5xl md:text-6xl py-1 md:py-5 pl-5 md:pl-10">mWeb.sk</div>
            </Link>
            <div class="main_menu md:absolute right-5 top-2 flex flex-row gap-8 pl-5 md:pl-0">
                <Link :href="route('admin')" v-if="$page.props.auth?.user?.is_admin">ADMIN</Link>  
                <Link :href="route('/')">DOMOV</Link>  
                <Link :href="route('page', {page_slug: 'o-mne'})">O MNE</Link>
                <Link :href="route('page', {page_slug: 'portfolio'})">PORTFÓLIO</Link>
                <Link :href="route('posts')">ČLÁNKY</Link>  
                <Link :href="route('contact.add')">KONTAKT</Link>  
            </div>
        </header>
        <section class="flex flex-col sm:flex-row  main-container">
            <aside class="sm:w-1/5 hidden lg:block px-2 py-4">
                <h3 class="underline">Vtip hodinky:</h3>
                {{ $page.props.joke }}
                <div class="text-sm mt-3">
                    
                </div>
            </aside>
            <main class="lg:w-4/5 mt-4 mx-3 pl-5 pb-16 pr-5 sm:pr-10">
                <Messages/>
                <slot />
            </main>
        </section>
        <footer class="mt-5 mb-10 text-center text-green-900">
                <div>&#169;{{ year }}, mWeb.sk</div>
        </footer>

    </div>

</template>



<script setup>
    import Messages from '@/Layouts/Messages.vue'
    import { Link } from '@inertiajs/vue3';

    let year = new Date().getFullYear();



</script>