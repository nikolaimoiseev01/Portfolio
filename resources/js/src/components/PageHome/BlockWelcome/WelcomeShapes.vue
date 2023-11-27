<template>
    <div id="shapes-mask" class="is-loaded"><!-- triangle-->
        <svg xmlns="http://www.w3.org/2000/svg" width="37.196" height="32.213" viewBox="0 0 37.196 32.213">
            <symbol id="triangle">
                <svg xmlns="http://www.w3.org/2000/svg" width="25.675" height="22.236" viewBox="0 0 25.675 22.236">
                    <path fill="none" stroke="#CF4981" stroke-width="3" stroke-miterlimit="10"
                          d="M12.837 3l5.12 8.868 5.12 8.868H2.597l5.12-8.868z"></path>
                </svg>
            </symbol>
        </svg><!-- semi circle-->
        <svg xmlns="http://www.w3.org/2000/svg" width="29.093" height="14.546" viewBox="0 0 29.093 14.546">
            <symbol id="semiCircle">
                <path fill="none" stroke="#CF4981" stroke-width="3" stroke-miterlimit="10"
                      d="M1.5 14.546C1.5 7.34 7.34 1.5 14.547 1.5c7.205 0 13.046 5.84 13.046 13.046"></path>
            </symbol>
        </svg><!-- spring-->
        <svg xmlns="http://www.w3.org/2000/svg" width="17.046" height="36.016" viewBox="0 0 17.046 36.016">
            <symbol id="spring">
                <path fill="none" stroke="#CF4981" stroke-width="3" stroke-miterlimit="10"
                      d="M9.945 34.614S1.46 31.38 1.5 23.92s11.73-4.797 11.73-4.797S3.82 16.708 4.18 8.77s12.784-7.255 12.784-7.255"></path>
            </symbol>
        </svg><!-- line-->
        <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 25.675 22.236">
            <symbol id="line">
                <path fill="none" stroke="#CF4981" stroke-width="3" stroke-miterlimit="10"
                      d="M4.92 2.514L21.964 19.56"></path>
            </symbol>
        </svg>


        <kinesis-element :strength="kinezisStrengthNegative" class="kinezis-element">
            <svg width="28px" height="28px" class="layer1 p2">
                <use xlink:href="#semiCircle" class="yellow"></use>
            </svg>
        </kinesis-element>

        <kinesis-element :strength="kinezisStrengthPositive" class="kinezis-element">
            <svg width="25px" height="25px" class="layer2 p3">
                <use width="25px" height="25px" xlink:href="#triangle" class="aqua"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthPositive" class="kinezis-element">
            <svg class="layer1 p4">
                <use xlink:href="#triangle" class="pink"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthNegative" class="kinezis-element">
            <svg width="28px" height="28px" class="layer1 p5">
                <use xlink:href="#semiCircle" class="aqua"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthPositive" class="kinezis-element">
            <svg width="36px" height="36px" class="layer2 p6">
                <use xlink:href="#spring" class="pink"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthNegative" class="kinezis-element">
            <svg width="36px" height="36px" class="layer2 p7">
                <use xlink:href="#spring" class="pink"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthPositive" class="kinezis-element">
            <svg width="22px" height="22px" class="layer2 p8">
                <use xlink:href="#line" class="aqua"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthNegative" class="kinezis-element">
            <svg width="22px" height="22px" class="layer1 p9">
                <use xlink:href="#line" class="aqua"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthPositive" class="kinezis-element">
            <svg width="22px" height="22px" class="layer2 p10">
                <use xlink:href="#line" class="yellow"></use>
            </svg>
        </kinesis-element>
        <kinesis-element :strength="kinezisStrengthNegative" class="kinezis-element">
            <svg width="28px" height="28px" class="layer1 p11">
                <use xlink:href="#semiCircle" class="aqua"></use>
            </svg>
        </kinesis-element>


    </div>

</template>

<script>
export default {
    name: "WelcomeShapes.vue",
    data() {
        return {
            kinezisStrengthPositive: 50,
            kinezisStrengthNegative: -40
        };
    }
}
</script>

<style lang="scss" scoped>

.kinezis-element {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100vh;
    width: 100vw;
    overflow: hidden;
}

//#shapes-mask {

    svg path {
        fill: none;
        stroke: inherit;
    }

    .layer1, .layer2 {
        position: absolute;
        z-index: 1;
    }

    .yellow {
        stroke: #ff0;
        fill: none;
    }

    .aqua {
        stroke: aqua;
        fill: none;
    }

    .pink {
        stroke: #f06449;
        fill: none;
    }

    #shapes-mask .p1 {
        left: 30%;
        top: 20%;
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    #shapes-mask .p2 {
        left: 90%;
        top: 70%
    }

    #shapes-mask .p3 {
        left: 100%;
        top: 20%;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg)
    }

    #shapes-mask .p4 {
        left: 70%;
        top: 20%
    }

    #shapes-mask .p5 {
        left: 5%;
        top: 80%
    }

    #shapes-mask .p5, #shapes-mask .p6 {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg)
    }

    #shapes-mask .p6 {
        left: 2%;
        top: 20%
    }

    #shapes-mask .p7 {
        left: 50%;
        bottom: 2%
    }

    #shapes-mask .p8 {
        left: 85%;
        bottom: 4%
    }

    #shapes-mask .p9 {
        left: 20%;
        top: 2%;
        -webkit-transform: rotate(65deg);
        transform: rotate(65deg)
    }

    #shapes-mask .p10 {
        left: 10%;
        bottom: 2%;
        -webkit-transform: rotate(85deg);
        transform: rotate(85deg)
    }


    .p1 {
        left: 30%;
        top: 20%;
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .p2 {
        left: 90%;
        top: 70%
    }

    .p3 {
        left: 100%;
        top: 20%;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg)
    }

    .p4 {
        left: 70%;
        top: 20%
    }

    .p5 {
        left: 5%;
        top: 80%
    }

    .p5, .p6 {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg)
    }

    .p6 {
        left: 2%;
        top: 20%
    }

    .p7 {
        left: 50%;
        bottom: 2%
    }

    .p8 {
        left: 85%;
        bottom: 4%
    }

    .p9 {
        left: 20%;
        top: 2%;
        -webkit-transform: rotate(65deg);
        transform: rotate(65deg)
    }

    .p10 {
        left: 10%;
        bottom: 2%;
        -webkit-transform: rotate(85deg);
        transform: rotate(85deg)
    }

    .p11 {
        left: 90%;
        top: 2%;
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg)
    }
//}
</style>
