<template>
    <div class="wrapper">
        <CurrentRequestContent :request="request" />
        <ReplyForm v-if="appearForm" />
        <div class="userInformation">
            <RequestUser :request="request" /><RouterLink
                class="capsuleButton"
                :to="`/request/${request.id}/update`"
                v-if="request.user_id == userid"
                >編集する</RouterLink
            >
            <button
                class="capsuleButton"
                v-else-if="isLogin && !appearForm"
                @click="toggleForm"
            >
                返信する
            </button>
        </div>
    </div>
</template>

<script>
import CurrentRequestContent from "../components/CurrentRequestContent.vue";
import RequestUser from "../components/Requests/RequestUser.vue";
import ReplyForm from "../components/Requests/ReplyForm.vue";
import { OK } from "../util";
export default {
    components: {
        CurrentRequestContent,
        RequestUser,
        ReplyForm
    },
    props: {
        id: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            request: {},
            appearForm: false
        };
    },
    computed: {
        userid() {
            return this.$store.getters["auth/userid"];
        },
        isLogin() {
            return this.$store.getters["auth/check"];
        }
    },
    watch: {
        $route: {
            async handler() {
                this.$store.commit("randing/loadingSwitch", true);
                await this.showRequest();
                this.$store.commit("randing/loadingSwitch", false);
            },
            immediate: true
        }
    },
    methods: {
        async showRequest() {
            const response = await axios.get(`/api/requests/${this.id}`);
            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
            }
            this.request = response.data;
        },
        toggleForm() {
            this.appearForm = true;
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../sass/common.scss";
.wrapper {
    background-color: white;
    padding: 30px;
    width: 500px;
    margin: auto;
}
.userInformation {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
button {
    cursor: pointer;
}
</style>
