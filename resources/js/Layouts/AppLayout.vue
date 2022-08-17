<template>
    <div class="container">
        <div class="row" style="border-bottom-style: solid; border-color: rgba(34,34,70,0.5);;">
            <div class="col-8" style="font-style: italic; font-size: 3em; margin-left: 1em;">
                mWeb.sk
            </div>
        </div>
        <div class="row">
            <SidePanel class="col-3 px-2 pt-4"></SidePanel >
            <main class="col-9 pt-4">
                <slot />
            </main>
        </div>

    </div>
</template>


<script>
    import SidePanel from './SidePanel.vue';
    export default{
        components:{
            SidePanel
        }

    }


</script>