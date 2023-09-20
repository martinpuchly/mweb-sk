<template>
    <div class="container mx-auto">
        <header class="border-b-2 relative">
            <div class="flex md:hidden float-right mt-2 mr-4"  @click="rea.showMenu=!rea.showMenu">
            <button 
            type="button"
            class="
                text-gray-800
                hover:text-gray-400
                focus:outline-none focus:text-gray-400
            ">
                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                    <path
                        fill-rule="evenodd"
                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                    ></path>
                </svg>
            </button>
        </div>
            <Link :href="route('/')" class="inline-block">
                <div class="text-green-100 text-4xl sm:text-5xl md:text-6xl py-1 md:py-5 pl-5 md:pl-10">mWeb.sk</div>
            </Link>
            <nav  :class="{ 'flex': rea.showMenu, 'hidden sm:flex': !rea.showMenu }" class="main_menu md:absolute right-5 top-2 sm:gap-5 pl-5 md:pl-0 flex-col sm:flex-row">
                <Link :href="route('admin')" v-if="$page.props.auth?.user?.is_admin">ADMIN</Link>  
                <Link :href="route('/')">DOMOV</Link>  
                <Link :href="route('page', {page_slug: 'o-mne'})">O MNE</Link>
                <Link :href="route('page', {page_slug: 'portfolio'})">PORTFÓLIO</Link>
                <Link :href="route('posts')">ČLÁNKY</Link>  
                <Link :href="route('contact.add')">KONTAKT</Link>  
            </nav>
        </header>
        <section class="flex flex-col sm:flex-row  main-container">
            <aside class="sm:w-1/5 hidden lg:block px-2 py-4">
                <h3 class="underline">Vtip hodinky:</h3>
                <div v-html="$page.props.hour_joke"></div>
                <div class="text-sm mt-3 border-t-2">
                    Tieto vtipy ani neviem načo som sem dal, keď ma napadne niečo lepšie tak to nahradím &#128517;.
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
    import Nav from '@/Layouts/Nav.vue'
    import { reactive } from 'vue'

    let year = new Date().getFullYear();

    const rea = reactive({
        showMenu: false
    })



</script>