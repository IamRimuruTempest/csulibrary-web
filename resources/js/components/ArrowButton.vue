<template>
    <div>
        <v-btn icon color="transparent" class="btn-arrow">
            <v-icon size="50" :color="color">mdi-arrow-right-thick</v-icon>
        </v-btn>
    </div>
</template>

<script>
export default {
    props: ["color"],
};
</script>

<style scoped>
.btn-arrow {
    transition: 0.5s;
}
.btn-arrow:hover {
    margin-left: 20px;
    transition: 0.5s;
}
</style>
