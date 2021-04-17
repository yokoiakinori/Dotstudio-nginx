<template>
    <div class="wrapper">
        <CurrentRequestContent :request="request" />
        <RequestUser :request="request" />
    </div>
</template>

<script>
import CurrentRequestContent from "../components/CurrentRequestContent.vue";
import RequestUser from "../components/Requests/RequestUser.vue";
import { OK } from "../util";
export default {
    components: {
        CurrentRequestContent,
        RequestUser
    },
    props: {
        id: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            request: {}
        };
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
</style>
