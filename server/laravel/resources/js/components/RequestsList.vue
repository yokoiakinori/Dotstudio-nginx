<template>
    <div>
        <div class="requestsList">
            <RequestItem
                v-for="request in requestList"
                :key="request.id"
                :request="request"
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
            requestList: Array
        };
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
</style>
