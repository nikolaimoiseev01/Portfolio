<template>
    <div id="logo_blue">
        <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 0 772.56 889.38">
            <defs>
                <linearGradient id="Безымянный_градиент_18" x1="82.77" y1="279.18" x2="496.64" y2="279.18"
                                gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#272c5e"/>
                    <stop offset="1" stop-color="#2c4884"/>
                </linearGradient>
                <linearGradient id="Безымянный_градиент_18-2" x1="0" y1="444.69" x2="772.56" y2="444.69"
                                xlink:href="#Безымянный_градиент_18"/>
            </defs>
            <polygon class="cls-1" points="82.77 99.84 152.81 53.14 496.64 382.12 496.64 505.22 82.77 99.84"/>
            <path class="cls-2 line-animation"
                  d="M698.78,323.38l73.78-78.24V0L556.07,174.12V658L0,142.29V889.38L227.1,726l-70-44.57L74.28,740.81V337.55l558.2,517.87,2.12-638.85,63.67-48.82Z"/>
        </svg>
    </div>

</template>

<script>
export default {
    name: "LogoBlue.vue"
}
</script>

<style lang="scss" scoped>


#logo_blue {
    width: 480px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);

    .cls-1 {
        fill: url(#Безымянный_градиент_18);
    }

    .cls-2 {
        fill: url(#Безымянный_градиент_18-2);
    }

    .line-animation {
        stroke-dasharray: 1000; /* Начальная длина линии (должна быть больше, чем длина линии) */
        stroke-dashoffset: 1000; /* Начальное смещение линии (вся длина) */
        animation: draw 2s ease-in-out forwards; /* Анимация с использованием ключевого кадра "draw" */
    }

    @keyframes draw {
        to {
            stroke-dashoffset: 0; /* Конечное смещение линии (нет смещения - полная длина) */
        }
    }
}
</style>
