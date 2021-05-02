<template>
    <div class="wrapper flexRowCenter" :style="requeststyle">
        <div class="roundSquareShadow card flexColumnStart">
            <RouterLink :to="`/request/${request.id}`"></RouterLink>
            <h4>{{ request.title }}</h4>
            <p>{{ request.contents }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        request: {},
        requeststyle: { width: 0 }
    }
};
</script>

<style lang="scss" scoped>
@import "../../../sass/common.scss";
.wrapper {
    height: 150px;
}
.card {
    position: relative;
    padding: 20px;
    width: 90%;
    height: 90%;
    a {
        position: absolute;
        border-radius: 15px;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
    }
}
</style>
