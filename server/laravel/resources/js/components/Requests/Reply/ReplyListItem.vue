<template>
    <div class="flexRow">
        <Product :product="reply.product" :productstyle="productStyle" />
        <p>{{ reply.comment }}</p>
    </div>
</template>

<script>
import Product from "../../Products/Product.vue";
export default {
    components: {
        Product
    },
    props: {
        reply: {}
    },
    computed: {
        productStyle() {
            const productSize = "120px";
            return {
                width: productSize,
                height: productSize
            };
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../../../sass/common.scss";
</style>
