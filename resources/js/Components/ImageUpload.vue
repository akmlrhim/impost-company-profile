<script setup>
import { computed, ref, watch } from "vue";

const props = defineProps({
    modelValue: { type: [File, Object, null], default: null },
    existing: { type: String, default: "" },
    label: { type: String, default: "Gambar" },
    accept: { type: String, default: "image/*" },
    error: { type: String, default: "" },
});

const emit = defineEmits(["update:modelValue", "remove"]);

const input = ref(null);
const previewUrl = ref(null);

const existingUrl = computed(() => (props.existing ? `/storage/${props.existing}` : null));
const shownUrl = computed(() => previewUrl.value || existingUrl.value);

watch(
    () => props.modelValue,
    (file) => {
        if (previewUrl.value && previewUrl.value.startsWith("blob:")) {
            URL.revokeObjectURL(previewUrl.value);
        }

        previewUrl.value = file ? URL.createObjectURL(file) : null;
    },
);

function onChange(event) {
    const file = event.target.files?.[0] ?? null;
    emit("update:modelValue", file);
}

function clear() {
    if (previewUrl.value && previewUrl.value.startsWith("blob:")) {
        URL.revokeObjectURL(previewUrl.value);
    }

    previewUrl.value = null;

    if (input.value) {
        input.value.value = "";
    }

    emit("update:modelValue", null);
    emit("remove");
}
</script>

<template>
    <div>
        <label class="block text-sm font-medium text-white">{{ label }}</label>

        <div class="mt-2 flex items-start gap-4">
            <div class="flex size-28 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-white/10 bg-white/5">
                <img v-if="shownUrl" :src="shownUrl" alt="Preview" class="size-full object-cover">
                <span v-else class="text-xs text-white">No image</span>
            </div>

            <div class="flex-1 space-y-2">
                <input
                    ref="input"
                    type="file"
                    :accept="accept"
                    class="block w-full cursor-pointer rounded-xl border border-white/10 bg-white/5 text-sm text-white file:mr-4 file:cursor-pointer file:rounded-l-xl file:border-0 file:bg-white/10 file:px-4 file:py-3 file:text-sm file:font-medium file:text-white hover:file:bg-white/20"
                    @change="onChange"
                >
                <button
                    v-if="shownUrl"
                    type="button"
                    class="text-xs font-medium text-red-400 transition hover:text-red-300"
                    @click="clear"
                >
                    Hapus gambar
                </button>
                <p class="text-xs text-white">Format: JPG, PNG, WEBP. Maks sesuai field.</p>
            </div>
        </div>

        <p v-if="error" class="mt-1 text-xs text-red-400">{{ error }}</p>
    </div>
</template>
