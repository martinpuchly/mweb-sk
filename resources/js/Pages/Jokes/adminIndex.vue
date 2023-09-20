<template>
    <AppLayout>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><Link :href="route('admin')">Admin</Link></li>
                </ol>
            </nav>
            <Link :href="route('admin.joke.add')" class="w-30 mb-2 float-right bg-green-900 hover:bg-green-800 text-white hover:text-white p-3 rounded-md grid justify-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <div>
                    pridať vtip
                </div>
            </Link>

            <h1 class="w-11/12">Vtipy:</h1>
            <br clear="all">
            <div v-if="jokes.data.length>0" v-for="joke in jokes.data" class="border-b-2">
                <p class="italic">{{ joke.text }}</p>
                <p class="flex flex-row gap-3 justify-end">
                    <Link :href="route('admin.joke.edit', {joke: joke.id})" class="btn btn-success py-0 h-7">upraviť</Link>
                    <button  @click.prevent="del(joke.id)" class="btn btn-danger py-0 h-7">vymazať</button>
                </p>
            </div>
            <div v-else class="text-red-600">
                Zatiaľ nemáme vtipy.
            </div>

        </div>  
    </AppLayout>
    <Head title="zoznam vtipov"></Head>

</template>




<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Link, router, Head } from '@inertiajs/vue3'


    const props = defineProps({
        jokes: Object
    })

    function del(id) {
        if(confirm(`Skutočne chcete vymazať vtip?`)){
            router.delete(route('admin.joke.delete', {joke: id}))
        }
    }

</script>
