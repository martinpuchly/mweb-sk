<template>
    <div v-if="links.length > 3">
        <div class="pagination">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="page-item"
                    v-html="link.label"
                />

                <Link
                    v-else
                    class="page-link"
                    :class="{ 'bg-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        Link,
    },
    props: {
        links: Array,
    },
});
</script>