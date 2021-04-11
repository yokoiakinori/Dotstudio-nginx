<template>
    <div>
        <div class="productsList" :style="style">
            <RequestItem
                v-for="product in productList"
                :key="product.id"
                :product="product"
                :appearIcon="true"
                @like="onLikeClick"
                :productstyle="productStyle"
            />
        </div>
        <Pagination
            :current-page="currentPage"
            :last-page="lastPage"
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
    }
};
</script>

<style scoped>
div {
    width: 100%;
}
</style>
