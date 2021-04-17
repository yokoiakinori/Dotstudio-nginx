<template>
    <div>
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

<style scoped>
div {
    width: 100%;
}
.requestsList {
    margin-bottom: 30px;
    display: flex;
    flex-flow: row wrap;
    align-content: flex-start;
}
</style>
