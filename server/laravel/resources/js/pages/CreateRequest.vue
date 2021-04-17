<template>
    <div class="wrapper">
        <h3>リクエストの作成</h3>
        <RequestEditForm
            :submitMessage="submitMessage"
            @formEnter="createRequest"
        ></RequestEditForm>
    </div>
</template>

<script>
import { OK } from "../util";
import RequestEditForm from "../components/Requests/RequestEditForm.vue";
export default {
    components: {
        RequestEditForm
    },
    data() {
        return {
            submitMessage: "作成する"
        };
    },
    methods: {
        async createRequest(form) {
            const response = await axios.post("/api/requests", form);
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
}
</style>
