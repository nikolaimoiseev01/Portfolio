<template>
    <footer class="footer">
        <div class="content width-restricted">
            <a href="https://t.me/tomas232" class="link">Telegram</a>
            <a href="mailto:nikolaimoiseev01@gmail.com" class="link">Email</a>
            <a href="https://www.instagram.com/kick__nick/" class="link">Instagram</a>
            <a href="https://github.com/nikolaimoiseev01" class="link">GitHub</a>
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
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

}
</style>
