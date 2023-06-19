<template>
    <div>
        <v-card-title
            class="text-uppercase text-decoration-underline pa-0 font-weight-bold"
            style="color: #8b0304"
            >{{ title }}
        </v-card-title>
    </div>
</template>

<script>
export default {
    props: ["title"],
};
</script>

<style scoped></style>
