<template>
    <div class="input-wrap">
        <label class="label">
            <slot></slot>
        </label>
        <input required
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            type="text" id="name" name="name">
    </div>
</template>

<script setup>
defineProps(['modelValue'])
defineEmits(['update:modelValue'])
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

.input-wrap {
    position: relative;
    width: 100%;

    &:before, &:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        transition: width .45s cubic-bezier(.694, .048, .335, 1);
    }

    &:before {
        background: #26408b;
        transition-delay: .1s;
        z-index: 10;
    }

    &:after {
        background: #f06449;
        z-index: 9;
    }

    input {
        display: block;
        width: 100%;
        border: 0;
        border-bottom: 2px solid silver;
        padding: 8px 5px;
        border-radius: 0;
        background: transparent;
        color: $color-main-bright;
        transition: border-color .25s;

        &:focus {
            outline: none;
            border-color: #26408b;
        }
    }

    label {
        //position: absolute;
        //top: -13px;
        font-size: 14px;
        left: 0;
        color: $color-main-bright;
        font-style: italic;
    }

    &:hover {
        &:before, &:after {
            width: 101%;
        }
    }
}
</style>
