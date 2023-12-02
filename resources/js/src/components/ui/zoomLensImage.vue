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
        '$route.params.id': ['setShowLens', 'updateFunction']
    },
    methods: {
        insertExternalSource: function () {
            if (window.outerWidth > 768) {


                var mainSizeHeight = this.size.height;
                var mainSizeWidth = this.size.width;
                const lens = this.$refs.lens;
                const input_image_size = this.image
                const input_image = {
                    'width': this.width,
                    'height': this.height
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
                    lens.style.backgroundSize = (input_image.width * zoomLevel) + "px " + (input_image.height * zoomLevel) + "px";

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
            }
        },
        setShowLens: function () {
            this.showLens = false
        },
        updateFunction: function () {
            setTimeout(() => {
                if (document.querySelector("#" + this.id)) {
                    this.insertExternalSource()
                }
            }, 1500)
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

.zoom-lens-image {
    text-align: center;
}

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

@media (max-width: 1025px) {
    img {
        max-width: 90%;
        height: fit-content;
    }
}
</style>
