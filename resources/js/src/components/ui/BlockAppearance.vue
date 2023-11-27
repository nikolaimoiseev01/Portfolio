<template>
    <div v-bind="$attrs" :class="{ 'is-hidden': !isVisible}" ref="block_appearance" class="block-appearance">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "BlockAppearance",
    data() {
        return {
            isVisible: false,
        };
    },
    mounted() {
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5, // Порог видимости
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    this.isVisible = true;
                }
            });
        }, options);

        observer.observe(this.$refs.block_appearance);

    },
    watch: {
        '$route.params.id': 'setShowLens'
    },
    methods: {
        setShowLens: function () {
            setTimeout(() => {
                this.isVisible = false
            }, 1000)
        }
    }


}
</script>

<style lang="scss" scoped>
.block-appearance {
    position: relative;
    z-index: 1;
    transition: all .3s;
    width: -webkit-fill-available;

    &.is-hidden {
        -webkit-transform: translateY(30px);
        transform: translateY(30px);
        opacity: 0;
    }
}
</style>
