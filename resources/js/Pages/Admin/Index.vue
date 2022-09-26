<template>
    <AppLayout>
        <h1>Admin</h1>

        <div class="container">
            <div class="row gx-5">
                <div class="col">
                <h2>Stránky</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.pages')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                            Stránky
                        </Link>
                    </li>
                    <li>
                    <Link :href="route('admin.pages.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                        Pridať stránku
                    </Link>
                    </li>
                </ul>
            </div>      
            <div class="col">
                <h2>Články</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.posts')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                            Novinky
                        </Link>
                    </li>
                    <li>
                    <Link :href="route('admin.posts.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                        Pridať novinku
                    </Link>
                    </li>
                </ul>

            </div>
            <div class="col">
                <h2>Novinky</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.quicknews')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                            Články
                        </Link>         
                    </li>
                    <li>
                    <Link :href="route('admin.quicknews.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                        Pridať článok
                    </Link>
                    </li>
                </ul>
            </div>  
            </div>
        </div>
    </AppLayout>
</template>




<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3';
    export default{
        components:{
            AppLayout,
            Link
        }

    }



</script>