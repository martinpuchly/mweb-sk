
import '../sass/app.scss';
import * as bootstrap from 'bootstrap'

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import CKEditor from '@ckeditor/ckeditor5-vue';

import { VueReCaptcha, useReCaptcha } from 'vue-recaptcha-v3'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'mWeb.sk';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        const captcheKey = props.initialPage.props.recaptcha_site_key;

        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueReCaptcha, { siteKey: captcheKey } )
            .use(ZiggyVue, Ziggy)
            .use( CKEditor )
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
