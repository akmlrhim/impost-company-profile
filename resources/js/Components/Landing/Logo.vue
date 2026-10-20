<script setup>
import { computed } from "vue";

/**
 * Logo IMPOST MEDIA.
 *
 * Mark memakai aset resmi berwarna: `/favicon/favicon.svg`
 * (varian emas, latar transparan) dan selalu tampil berwarna
 * di latar terang maupun gelap. Wordmark tetap teks agar tajam
 * di segala ukuran.
 *
 * Set `wordmark=false` untuk menampilkan mark saja (tanpa teks IMPOST MEDIA).
 */
const MARK_SRC = "/favicon/favicon.svg";

const props = defineProps({
    size: {
        type: String,
        default: "md",
        validator: (value) => ["sm", "md", "lg"].includes(value),
    },
    wordmark: {
        type: Boolean,
        default: true,
    },
});

const SIZES = {
    sm: { mark: "h-9 w-[51px]", text: "text-[13px]" },
    md: { mark: "h-12 w-[68px]", text: "text-[15px] sm:text-[17px]" },
    lg: { mark: "h-14 w-[79px]", text: "text-[18px] sm:text-[20px]" },
};

const markClass = computed(() => SIZES[props.size].mark);
const textClass = computed(() => SIZES[props.size].text);
</script>

<template>
    <span class="inline-flex items-center gap-2.5 sm:gap-3">
        <img
            :src="MARK_SRC"
            alt=""
            aria-hidden="true"
            decoding="async"
            class="shrink-0 object-cover"
            :class="markClass"
        >

        <span
            v-if="wordmark"
            class="flex flex-col font-extrabold uppercase leading-none"
            :class="textClass"
        >
            <span>IMPOST</span>
            <span class="mt-1">MEDIA</span>
        </span>
    </span>
</template>
