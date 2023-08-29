<template>
    <div class="container mx-auto">
        <header class="border-b-2 bg-white relative">
            <Link :href="route('/')">
                <div class="text-primary text-6xl py-5 pl-10">mWeb.sk</div>
            </Link>
            <div class="main_menu absolute right-5 top-2 flex flex-col sm:flex-row sm:gap-10">
                <Link :href="route('admin')" v-if="$page.props.auth?.user?.is_admin">ADMIN</Link>  
                <Link :href="route('/')">DOMOV</Link>  
                <Link :href="route('page', {page_slug: 'portfolio'})">PORTFÓLIO</Link>
                <Link :href="route('posts')">ČLÁNKY</Link>  
                <Link :href="route('contact.add')">KONTAKT</Link>  
            </div>
        </header>
        <section class="flex flex-col sm:flex-row  main-container">
            <aside class="sm:w-1/5 px-2 py-4">
                <h3 class="underline">O mne:</h3>
                <p class="lh-md text-justify mx-2"> Vo voľnom čase sa rád venujem programovaniu. Je to koníček a neživím sa tým. Venujem sa tomu už minimálne 10 rokov, vzhľadom na to že rád experimentujem s novými technológiami, nemám žiadny trvalý projekt na ktorom by som pracoval. Všetko končí v koši a ja začnem odznovu s niečím iným. 
                    <br>Možno aspoň táto stránka bude chvíľu online ako "portfólio". </p>
                <h3 class="mt-5 underline">Kontakt:</h3>
                <div class="flex flex-row gap-5">
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
            </aside>
            <main class="sm:w-4/5 mt-4 mx-3 pl-5 pb-16">
                <Messages/>
                <slot />
            
            </main>
        </section>
        <footer class="mt-5 mb-10 text-center">
                <div>&#169;{{ year }}, mWeb.sk</div>
        </footer>

    </div>

</template>



<script setup>
    import Messages from '@/Layouts/Messages.vue'
    import { Link } from '@inertiajs/vue3';

    let year = new Date().getFullYear();


</script>