import "../css/app.css";

import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { MotionConfig } from "motion-v";
import { ZiggyVue } from "ziggy-js";
import { createApp, h } from "vue";

const pages = import.meta.glob("./Pages/**/*.vue");

createInertiaApp({
    title: (title) => (title ? `${title} | Impost Media` : "Impost Media"),

    resolve: (name) => {
        const page = pages[`./Pages/${name}.vue`];

        if (!page) {
            throw new Error(`Page component not found: ${name}`);
        }

        return page();
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(MotionConfig, { reducedMotion: "user" }, () => h(App, props)) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },

    progress: {
        color: "#d4ac3c",
    },
});
