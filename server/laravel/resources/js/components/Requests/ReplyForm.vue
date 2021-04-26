<template>
    <form class="form" action @submit.prevent="submitReply">
        <button
            class="solidSquareButton"
            @click="modalToggle"
            v-if="currentProductName != null"
        >
            {{ currentProductName }}
        </button>
        <button class="solidSquareButton" v-else @click="modalToggle">
            提供する素材を選択してください。
        </button>
        <transition>
            <ModalWindow
                v-if="modalWindow"
                @closeModal="modalToggle"
                @formEnter="currentProduct"
            >
                <h2>プロダクト一覧</h2>
                <ul>
                    <li
                        v-for="(product, index) in products"
                        :key="index"
                        @click="selectProduct(index + 1)"
                    >
                        <RequestProduct
                            :product="product"
                            :productstyle="productStyle"
                            :selectCheck="index == selectProductIndex - 1"
                        ></RequestProduct>
                    </li>
                </ul>
            </ModalWindow>
        </transition>
        <label for="reply-comment">コメント</label>
        <textarea
            class="form__item"
            v-model="replyForm.comment"
            cols="30"
            rows="4"
        ></textarea>
        <div class="form__button">
            <button type="submit" class="button">送信</button>
        </div>
    </form>
</template>

<script>
import ModalWindow from "../ModalWindow.vue";
import RequestProduct from "./RequestProduct.vue";
import { OK } from "../../util";
export default {
    components: {
        ModalWindow,
        RequestProduct
    },
    props: {
        request: Object
    },
    data() {
        return {
            replyForm: {
                product_id: Number,
                comment: "",
                request_id: Number,
                opponent_id: Number
            },
            maxwidth: 400,
            products: Array,
            modalWindow: false,
            currentProductIndex: 1,
            selectProductIndex: 1,
            currentProductName: null
        };
    },
    computed: {
        userid() {
            return this.$store.getters["auth/userid"];
        },
        productStyle() {
            const displayNumberRow = 3;
            const product = `${this.maxwidth / displayNumberRow}px`;
            return {
                width: product,
                height: product
            };
        }
    },
    watch: {
        $route: {
            async handler() {
                await this.showProductList();
            },
            immediate: true
        }
    },
    methods: {
        errorResponse(val) {
            if (val.status !== OK) {
                this.$store.commit("error/setCode", val.status);
                return false;
            }
        },
        modalToggle() {
            this.modalWindow = !this.modalWindow;
        },
        async submitReply() {
            this.replyForm.opponent_id = this.request.user_id;
            this.replyForm.request_id = this.request.id;
            const response = await axios.post("/api/requests/reply/");
            this.errorResponse(response);
        },
        async showProductList() {
            const response = await axios.get(
                `/api/users/products/${this.userid}/?page=1`
            );
            this.errorResponse(response);
            this.products = response.data.data;
        },
        async currentProduct() {
            this.currentProductIndex = this.selectProductIndex;
            this.currentProductName = this.products[
                this.currentProductIndex - 1
            ].productname;
            await this.modalToggle();
            this.replyForm.product_id = this.products[
                this.currentProductIndex - 1
            ].id;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../../sass/common.scss";
button {
    cursor: pointer;
    margin-bottom: 20px;
}
.v-enter-active,
.v-leave-active {
    transition: opacity 0.2s;
}
.v-enter,
.v-leave-to {
    opacity: 0;
}
</style>
