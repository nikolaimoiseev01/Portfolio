<template>
    <div ref="lightCircle" class="light-circle-wrap">

    </div>
</template>

<script>
export default {
    name: "LightCircle.vue",

    mounted() {
            window.addEventListener('mousemove', this.moveCircle);
    },
    methods: {
        moveCircle(event) {
            const lightCircle = this.$refs.lightCircle;
            if(lightCircle) {
                lightCircle.style.background = `radial-gradient(400px at ${event.clientX}px ${event.clientY}px, rgba(29, 78, 216, 0.05), transparent 80%)`;
            }

        }
    }
}
</script>

<style scoped>
.light-circle-wrap {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(400px at 0 0, rgba(29, 78, 216, 0.05), transparent 80%);
}
</style>
