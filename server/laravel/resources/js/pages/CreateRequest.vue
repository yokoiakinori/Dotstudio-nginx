<template>
    <div class="wrapper">
        <h3>リクエストの作成</h3>
        <form class="form" action @submit.prevent="createRequest">
            <label for="request-name">リクエスト名</label>
            <input class="form__item" type="text" v-model="updateForm.title" />
            <label for="request-contents">リクエストしたい内容の詳細</label>
            <textarea
                class="form__item"
                v-model="updateForm.contents"
                cols="30"
                rows="8"
            ></textarea>
            <div class="form__button">
                <button type="submit" class="button">更新する</button>
            </div>
        </form>
    </div>
</template>

<script>
import { OK } from "../util";
export default {
    data() {
        return {
            updateForm: {
                title: "",
                contents: ""
            }
        };
    },
    methods: {
        async createRequest() {
            const response = await axios.post("/api/requests", this.updateForm);
            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
            }
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../sass/common.scss";
.wrapper {
    width: 90%;
    display: flex;
    flex-flow: wrap column;
    align-items: center;
    margin: 0 auto;
    padding-top: 30px;
    form {
        width: 500px;
        flex-flow: column;
        display: flex;
    }
    h3 {
        margin-bottom: 40px;
    }
}
</style>
