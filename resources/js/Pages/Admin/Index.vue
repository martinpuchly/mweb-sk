<template>
    <AppLayout>
        <h1>Admin</h1>

        <div class="container">
            <div class="row gx-5">
                <div class="col-md-3">
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
            <div class="col-md-3">
                <h2>Články</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.posts')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                            Články
                        </Link>
                    </li>
                    <li>
                    <Link :href="route('admin.posts.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                        Pridať článok
                    </Link>
                    </li>
                </ul>

            </div>
            <div class="col-md-3">
                <h2>Novinky</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.quicknews')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                            Novinky
                        </Link>         
                    </li>
                    <li>
                    <Link :href="route('admin.quicknews.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                        Pridať novinku
                    </Link>
                    </li>
                </ul>
            </div> 
            <div class="col-md-3">
                <h2>Správy</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.contact')" title="kontakty/správy" class="px-2" style="color:black; text-decoration:none">
                            Správy
                        </Link>         
                    </li>
                </ul>
            </div>  
        </div> 
        <div class="row gx-5 mt-4">
            <div class="col-md-3">
                <h2>Užívatelia</h2>
                <ul>
                    <li>
                        <Link :href="route('admin.users')" title="užívatelia" class="px-2" style="color:black; text-decoration:none">
                            Užívatelia
                        </Link>         
                    </li>
                </ul>
            </div>  
            </div>
        </div>
    </AppLayout>


    <Head>
        <title>administrácia</title>
    </Head>


</template>




<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link, Head } from '@inertiajs/inertia-vue3';
    export default{
        components:{
            AppLayout,
            Link,
            Head
        }

    }



</script>