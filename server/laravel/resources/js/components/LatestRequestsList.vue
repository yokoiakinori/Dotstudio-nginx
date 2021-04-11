<template>
    <div class="latestRequestList">
        <ul>
            <RequestItem
                v-for="request in requestList"
                :key="request.id"
                :request="request"
            />
        </ul>
        <RouterLink class="capsuleButton" to="/request/new"
            >リクエストしてみる</RouterLink
        >
    </div>
</template>

<script>
import RequestItem from "./Requests/RequestItem.vue";
export default {
    components: {
        RequestItem
    },
    props: {
        requests: null
    },
    data() {
        return {
            requestList: Array
        };
    },
    watch: {
        requests(val) {
            this.productList = val;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../sass/common.scss";
div {
    width: 100%;
    display: flex;
    flex-flow: column;
    align-items: center;
}
ul {
    height: 40px;
    display: flex;
    a {
        display: block;
    }
}
</style>
