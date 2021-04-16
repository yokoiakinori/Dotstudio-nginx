<template>
    <div class="wrapper" :style="requeststyle">
        <div class="roundSquareShadow card">
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
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150px;
}
.card {
    position: relative;
    flex-flow: column;
    justify-content: start;
    align-items: flex-start;
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
