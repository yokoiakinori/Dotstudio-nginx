<template>
    <div>
        <h3>{{ request.title }}</h3>
        <p>{{ request.contents }}</p>
        <p>{{}}</p>
    </div>
</template>

<script>
export default {
    props: {
        request: {}
    }
};
</script>

<style></style>
