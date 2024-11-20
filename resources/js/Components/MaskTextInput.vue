<script setup>
import { MaskInput } from 'vue-3-mask';
import {ref, useAttrs, watch} from "vue";

const props = defineProps({
    mask: {
        required: true,
        type: String
    }
})
const attrs = useAttrs();
const elRef = ref(null)

defineOptions({
    inheritAttrs: false
})

// MaskInput bileşenin Watch prpblemi olduğunu tespit ettiğim için yapıldı.
watch(elRef, (v) => {
    v.$el.value = v.applyMask(attrs.modelValue);
    v.$emit('update:modelValue', v.$el.value);
}, {
    once: true
});

</script>

<template>
    <MaskInput
        :mask="mask"
        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        v-bind="$attrs"
        ref="elRef"
    />
</template>

<style scoped>

</style>
