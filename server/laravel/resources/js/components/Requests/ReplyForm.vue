<template>
    <form class="form" action @submit.prevent="formEnter">
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
                @formEnter="currentMaterial"
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
                            :selectCheck="index == selectMaterialIndex - 1"
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
    data() {
        return {
            replyForm: {
                product_id: Number,
                comment: ""
            },
            products: Array,
            modalWindow: false,
            currentProductName: null
        };
    },
    computed: {
        userid() {
            return this.$store.getters["auth/userid"];
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
        formEnter() {
            this.$emit("formEnter", this.replyForm);
        },
        async showProductList() {
            const response = await axios.get(
                `/api/users/products/${this.userid}/?page=1`
            );
            this.errorResponse(response);
            this.products = response.data.data;
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
