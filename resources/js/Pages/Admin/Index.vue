<template>
    <AppLayout>
        <h1>Admin</h1>
        <h2>Stránky</h2>
            <div class="d-inline-block">
                <Link :href="route('admin.pages')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                    Stránky
                </Link>
            </div>
            <div class="d-inline-block">
                <Link :href="route('admin.pages.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                    Pridať stránku
                </Link>
            </div>
        <h2>Články</h2>
            <div class="d-inline-block">
                <Link :href="route('admin.posts')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                    Články
                </Link>
            </div>
            <div class="d-inline-block">
                <Link :href="route('admin.posts.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                    Pridať článok
                </Link>
            </div>
        <h2>Novinky</h2>
            <div class="d-inline-block">
                <Link :href="route('admin.quicknews')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                    Články
                </Link>
            </div>
            <div class="d-inline-block">
                <Link :href="route('admin.quicknews.create')" title="mweb.sk" class="px-2" style="color:black; text-decoration:none">
                    Pridať článok
                </Link>
            </div>
    </AppLayout>
</template>




<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    export default{
        components:{
            
        }

    }



</script>