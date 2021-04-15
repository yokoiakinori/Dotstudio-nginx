<template>
    <div class="wrapper" :style="requeststyle">
        <div class="roundSquareShadow card">
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
    flex-flow: column;
    justify-content: start;
    align-items: flex-start;
    padding: 20px;
    width: 90%;
    height: 90%;
}
</style>
