<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <Link :href="route('/')" title="mweb.sk" class="navbar-brand px-2"><h3 class="text-light">mWeb.sk</h3></Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link :href="route('posts')" title="mweb.sk" class="navbar-brand px-2">Články</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('page', {page_slug: 'portfolio'})" title="mweb.sk" class="navbar-brand px-2">Moje pokusy</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('contact')" title="kontakt" class="navbar-brand px-2">Kontakt</Link>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item" style="color:red" v-if="$page.props.auth.check">
                        <Link :href="route('logout')" method="post" class="navbar-brand px-2 fs-6 text-secondary">odhlásiť</Link>
                    </li>
                    <li class="nav-item" style="color:red" v-else>
                        <Link :href="route('login')" class="navbar-brand px-2 fs-6 text-secondary">prihlásiť</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script>
import { Link } from '@inertiajs/inertia-vue3';

    export default{
        components:{
            Link
        }
    }

</script>