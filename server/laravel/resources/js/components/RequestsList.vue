<template>
    <div class="wrapper">
        <RouterLink class="capsuleButton" to="/request/new"
            >リクエストしてみる</RouterLink
        >
        <div class="requestsList">
            <RequestItem
                v-for="request in requestList"
                :key="request.id"
                :request="request"
                :requeststyle="requestStyle"
            />
        </div>
        <Pagination
            :currentPage="currentPage"
            :lastPage="lastPage"
            :routerPath="routerPath"
        />
    </div>
</template>

<script>
import Pagination from "./Pagination.vue";
import RequestItem from "./Requests/RequestItem.vue";
export default {
    components: {
        RequestItem,
        Pagination
    },
    props: {
        page: {
            type: Number,
            required: false,
            default: 1
        },
        requests: null,
        routerPath: String,
        currentPage: 0,
        lastPage: 0
    },
    data() {
        return {
            maxwidth: 900,
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
.wrapper {
    width: 100%;
    display: flex;
    flex-flow: column;
    align-items: center;
    a {
        margin-bottom: 15px;
    }
}
.requestsList {
    width: 100%;
    margin-bottom: 30px;
    display: flex;
    flex-flow: row wrap;
    align-content: flex-start;
}
</style>
