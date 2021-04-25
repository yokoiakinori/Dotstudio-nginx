<template>
    <div>
        <ThumbnailImage :user="requestUser" class="thumbnail" />
        <div class="content">
            <h3 class="name">
                {{ requestUser.name }}
            </h3>
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
        requestUser: Object
    }
};
</script>

<style lang="scss" scoped>
@import "../../../sass/common.scss";
div {
    display: flex;
    align-items: center;
}
.thumbnail {
    width: 80px;
    height: 80px;
}
.content {
    margin-left: 20px;
}
</style>
