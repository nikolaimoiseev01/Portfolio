<template>
    <footer class="footer">
        <div class="content width-restricted">
            <a href="" class="link">LinkedIn</a>
            <a href="" class="link">Codepen</a>
            <a href="" class="link">GitHub</a>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer.vue"
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/app";

footer {
    width: 100%;
    background: $color-main-dark;
    padding: 50px 0;
    margin-top: 50px;

    .content {
        display: flex;
        gap: 20px;
        justify-content: center;
    }

}
</style>
