<template>
    <div>
        <!-- <img :src="`http://127.0.0.1:8000/profiles/${image}`" alt="" /> -->
        <HeroPageVue />
        <EventPage />
        <BookPage />
        <BookHighestRating />
        <StaffpickPageVue />
        <FooterPageVue />
    </div>
</template>

<script lang="ts">
import BookHighestRating from "./HomePage/BookHighestRating.vue";
import HeroPageVue from "./HomePage/HeroPage.vue";
import EventPage from "./HomePage/EventPage.vue";
import BookPage from "./HomePage/BookPage.vue";
import StaffpickPageVue from "./HomePage/StaffpickPage.vue";
import FooterPageVue from "./FooterPage.vue";
import axios from "axios";
export default {
    components: {
        HeroPageVue,
        EventPage,
        BookPage,
        StaffpickPageVue,
        FooterPageVue,
        BookHighestRating,
    },

    data: () => ({
        image: "12311.png",
    }),

    methods: {},

    created() {},
};
</script>

<style lang="scss" scoped></style>
