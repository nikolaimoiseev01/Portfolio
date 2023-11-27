<template lang="html">

    <section class="zoom-lens-image">
        <div @keydown.esc="showLens = false" class="zoom--lens--image--container" :style="{ position: 'relative' }">
            <img style="cursor: zoom-in" @click="showLens = true" :id="id" :class="classname" :src="image.small"
                 :width="width" :height="height" :alt="alttext"/>
            <div :style="{backgroundImage: 'url(' + image.full + ')'}" :class="{'active' : showLens}" ref="lens"
                 class="lens">
                <p class="lens-title">ESC, чтобы закрыть</p>
            </div>
        </div>
    </section>

</template>

<script lang="js">

export default {
    name: 'zoom-lens-image',
    props: {
        id: {
            type: String,
            required: true
        },
        classname: {
            type: String,
            required: false
        },
        width: {
            type: Number,
            required: true
        },
        height: {
            type: Number,
            required: true
        },
        size: {
            height: {
                type: String,
                required: true
            },
            width: {
                type: String,
                required: true
            }

        },
        image: {
            full: {
                type: String,
                required: true
            },
            small: {
                type: String,
                required: true
            }
        },
        alttext: {
            type: String,
            required: true
        },
        zoomlevel: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            showLens: false
        }
    },
    watch: {
        '$route.params.id': 'setShowLens'
    },
    methods: {
        insertExternalSource: function () {
            var mainSizeHeight = this.size.height;
            var mainSizeWidth = this.size.width;
            const lens = this.$refs.lens;
            const input_image = {
                full: this.image.full,
                small: this.image.small
            }

            function zoomLens(imageElement, resultElement) {


                var image,
                    result,
                    coordinates_x,
                    coordinates_y;

                image = document.querySelector(imageElement);
                result = document.querySelector(resultElement);

                lens.style.border = "0.5px solid #000";
                lens.style.position = "absolute";
                lens.style.width = mainSizeWidth;
                lens.style.height = mainSizeHeight;

                image.parentElement.insertBefore(lens, image);

                coordinates_x = (result.offsetWidth / lens.offsetWidth) * 0.25;
                coordinates_y = (result.offsetHeight / lens.offsetHeight) * 0.25;

                result.style.backgroundImage = "url('" + input_image.small + "')";
                result.style.backgroundSize = (image.width * coordinates_x) + "px " + (image.height * coordinates_y) + "px";

                lens.addEventListener("mousemove", movingLens);
                image.addEventListener("mousemove", movingLens);

                lens.addEventListener("touchmove", movingLens);
                image.addEventListener("touchmove", movingLens);


                function movingLens(e) {

                    var pos,
                        x,
                        y;

                    e.preventDefault();

                    pos = getCursorPosition(e, image);

                    x = pos.x - (lens.offsetWidth / 2);
                    y = pos.y - (lens.offsetHeight / 2);

                    if (x > image.width - lens.offsetWidth) {

                        x = image.width - lens.offsetWidth;

                    }

                    if (x < 0) {

                        x = 0;

                    }

                    if (y > image.height - lens.offsetHeight) {

                        y = image.height - lens.offsetHeight;

                    }

                    if (y < 0) {

                        y = 0;

                    }

                    lens.style.left = x + "px";
                    lens.style.top = y + "px";

                    result.style.backgroundPosition = "-" + (x * coordinates_x) + "px -" + (y * coordinates_y) + "px";

                }

            }

            function zoomMagnifyingGlasses(imageElement, zoomLevel) {

                var image,
                    width,
                    height;

                image = document.querySelector(imageElement);

                lens.style.position = "absolute";
                lens.style.border = "1px solid #000";
                lens.style.borderRadius = "25px";
                lens.style.cursor = "none";
                lens.style.width = mainSizeWidth;
                lens.style.height = mainSizeHeight;

                image.parentElement.insertBefore(lens, image);

                lens.style.backgroundImage = "";

                lens.style.backgroundRepeat = "no-repeat";
                lens.style.backgroundSize = (image.width * zoomLevel) + "px " + (image.height * zoomLevel) + "px";

                width = lens.offsetWidth / 2;
                height = lens.offsetHeight / 2;

                lens.addEventListener("mousemove", movingMagnifier);
                image.addEventListener("mousemove", movingMagnifier);

                lens.addEventListener("touchmove", movingMagnifier);
                image.addEventListener("touchmove", movingMagnifier);

                function movingMagnifier(e) {

                    var pos,
                        x,
                        y;

                    e.preventDefault();

                    pos = getCursorPosition(e, image);

                    x = pos.x;
                    y = pos.y;

                    if (x > image.width - (width / zoomLevel)) {

                        x = image.width - (width / zoomLevel);

                    }

                    if (x < width / zoomLevel) {

                        x = width / zoomLevel;

                    }

                    if (y > image.height - (height / zoomLevel)) {

                        y = image.height - (height / zoomLevel);

                    }

                    if (y < height / zoomLevel) {

                        y = height / zoomLevel;

                    }

                    lens.style.left = (x - width) + "px";
                    lens.style.top = (y - height) + "px";

                    lens.style.backgroundPosition = "-" + ((x * zoomLevel) - width) + "px -" + ((y * zoomLevel) - height) + "px";

                }

            }

            // Help functions

            function getCursorPosition(e, imageElement) {

                var image,
                    position_x = 0,
                    position_y = 0;

                e = e || window.event;

                image = imageElement.getBoundingClientRect();

                position_x = e.pageX - image.left;
                position_y = e.pageY - image.top;

                position_x = position_x - window.pageXOffset;
                position_y = position_y - window.pageYOffset;

                return {x: position_x, y: position_y};

            }

            const zlvl = Number(this.zoomlevel);

            zoomMagnifyingGlasses("#" + this.id, zlvl);

        },
        setShowLens: function() {
            this.showLens = false
        }
    },
    mounted() {
        this.insertExternalSource();


        document.addEventListener("keydown", (e) => {
            if (e.keyCode === 27) {
                this.showLens = false
            }
        });
    },
    computed: {}
}


</script>

<style scoped lang="scss">
@import "/resources/scss/app.scss";

.lens {
    position: relative;
    opacity: 0;
    visibility: hidden;
    transition: opacity .3s ease-in-out;

    &.active {
        opacity: 1;
        visibility: visible;
        transition: opacity .3s ease-in-out;
    }

    .lens-title {
        position: absolute;
        top: 0;
        right: 20px;
        font-size: 14px;
        background: $color-main-dark;
        padding: 2px 8px;
        color: $color-main-bright;
        border-radius: 4px;

    }
}
</style>
