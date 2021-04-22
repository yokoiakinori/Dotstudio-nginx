<template>
    <form class="form" action @submit.prevent="formEnter">
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
    </form></template
>

<script>
export default {
    data() {
        return {
            replyForm: {
                comment: ""
            }
        };
    },
    methods: {
        formEnter() {
            this.$emit("formEnter", this.replyForm);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../../sass/common.scss";
</style>
