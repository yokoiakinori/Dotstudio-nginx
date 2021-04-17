<template>
    <div>
        <ThumbnailImage :user="request.user" class="thumbnail" />
        <div class="content">
            <h3 class="name">{{ request.user.name }}</h3>
        </div>
    </div>
</template>

<script>
import ThumbnailImage from "../ThumbnailImage.vue";
export default {
    components: {
        ThumbnailImage
    },
    props: {
        request: {}
    }
};
</script>

<style lang="scss" scoped>
@import "../../../sass/common.scss";
div {
    display: flex;
}
.thumbnail {
    width: 80px;
    height: 80px;
}
</style>
