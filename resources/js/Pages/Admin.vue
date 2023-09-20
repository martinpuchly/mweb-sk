
<template>
    <AppLayout>
        <h2>Administrácia: </h2>
        <div class="flex flex-col md:flex-row justify-items-stretch mt-5">
            <Link :href="route('admin.posts')" class="w-28 h-28 flex-2 text-center flex flex-col hover:bg-green-200 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" height="5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                Články
            </Link>
            <Link :href="route('admin.pages')" class="w-28 h-28 flex-2 text-center flex flex-col hover:bg-green-200 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" height="5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                Stránky
            </Link>
            <Link :href="route('admin.contacts')" class="w-28 h-28 flex-2 text-center flex flex-col hover:bg-green-200 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" height="5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
                Správy od užívateľov
            </Link>
            <Link :href="route('admin.jokes')" class="w-28 h-28 flex-2 text-center flex flex-col hover:bg-green-200 p-3 rounded-lg">
                <svg fill="#000000" height="5em" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 121.668 121.668" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M60.834,121.668C27.29,121.668,0,94.378,0,60.834S27.29,0,60.834,0s60.834,27.29,60.834,60.834 S94.378,121.668,60.834,121.668z M60.834,6C30.599,6,6,30.599,6,60.834c0,30.236,24.599,54.834,54.834,54.834 s54.834-24.599,54.834-54.834C115.668,30.598,91.069,6,60.834,6z"></path> <circle cx="26.828" cy="60.835" r="8.364"></circle> <circle cx="94.841" cy="60.835" r="8.364"></circle> <path d="M83.306,83.971H37.964v6h17.605c0.622,7.825,6.584,13.986,13.834,13.986s13.212-6.161,13.834-13.986h0.068L83.306,83.971 L83.306,83.971z M69.403,97.957c-3.966,0-7.249-3.478-7.805-7.986h15.608C76.651,94.48,73.369,97.957,69.403,97.957z"></path> </g> </g></svg>
                Vtipy
            </Link>
        </div>
    </AppLayout>
</template>


<script setup>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import { Link } from "@inertiajs/vue3";

</script>