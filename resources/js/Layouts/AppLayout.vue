<template>
    <div>
        <LayoutNav></LayoutNav>

        <div class="container container-main ">
            <div class="row">
                <SidePanel class="col-3 px-2 pt-4" style="border-right-style: solid; border-color: rgba(34,34,70,0.5);"></SidePanel >
                <main class="col-9 pt-4">
                    <div  v-if="$page.props.flash.succeed" class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            {{ $page.props.flash.succeed }}
                        </div>
                    </div>
                    <div v-if="$page.props.flash.notice" class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                            {{ $page.props.flash.notice }}
                        </div>
                    </div>
                    <div v-if="$page.props.flash.error" class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            {{ $page.props.flash.error }}
                        </div>
                    </div>
                    <slot />
                </main>
            </div>
        </div>    


    </div>

        
</template>


<script>
    import SidePanel from './SidePanel.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    import LayoutNav from './LayoutNav.vue';
    export default{
        components:{
            SidePanel,
            Link,
            LayoutNav
        }

    }


</script>