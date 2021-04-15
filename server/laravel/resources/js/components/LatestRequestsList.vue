<template>
    <div class="latestRequestList">
        <ul>
            <RequestItem
                v-for="request in requestList"
                :key="request.id"
                :request="request"
                :requeststyle="requestStyle"
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
            maxwidth: 900,
            style: {
                width: "900px"
            },
            requestList: Array
        };
    },
    computed: {
        requestStyle() {
            const columnCount = 5;
            const request = `${this.maxwidth / columnCount}px`;
            return {
                width: request
            };
        }
    },
    watch: {
        requests(val) {
            this.requestList = val;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../sass/common.scss";
.latestRequestList {
    width: 100%;
    display: flex;
    flex-flow: column;
    align-items: center;
    margin-bottom: 40px;
}
ul {
    padding: 0;
    width: 900px;
    flex-flow: row;
    justify-content: start;
    a {
        display: block;
    }
}
</style>
