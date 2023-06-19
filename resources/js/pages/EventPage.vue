<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Events" class="mb-15" />

                <v-card class="mt-15" elevation="0">
                    <h2 class="text-uppercase text">Upcoming Events</h2>
                    <v-row>
                        <v-col
                            v-for="item of upcomingEvents"
                            :key="item.id"
                            cols="4"
                            class="py-10"
                        >
                            <v-card
                                @click="openEventInformation(item)"
                                elevation="0"
                            >
                                <img
                                    :src="`http://127.0.0.1:8000/events/${item.image}`"
                                    alt=""
                                    width="100%"
                                    height="200"
                                    class="image"
                                />
                                <p class="mt-4 mb-0 text-left font-weight-bold">
                                    {{ item.title }}
                                </p>
                                <p class="text-left mb-0">{{ item.date }}</p>
                                <p class="text-left">{{ item.location }}</p>
                            </v-card>
                        </v-col>
                    </v-row>

                    <h2 class="text-uppercase text">All Events</h2>
                    <div>
                        <v-row
                            v-for="(item, index) of getAllEvents"
                            :key="index"
                            class="py-5"
                        >
                            <v-col cols="8">
                                <p class="mt-2 mb-0 text-left">
                                    {{ item.date }} @ {{ item.time }}
                                </p>
                                <h2>
                                    {{ item.title }}
                                </h2>
                                <p class="text-left font-weight-medium">
                                    {{ item.location }}
                                </p>
                                <p class="text-left">
                                    {{ item.description.slice(0, 400) }}...
                                </p>
                            </v-col>
                            <v-col cols="4">
                                <img
                                    @click="openEventInformation(item)"
                                    :src="`http://127.0.0.1:8000/events/${item.image}`"
                                    alt=""
                                    width="100%"
                                    height="200"
                                    class="image"
                                    style="cursor: pointer"
                                />
                            </v-col>
                        </v-row>
                    </div>
                </v-card>
            </v-card>
        </v-container>
        <FooterPage />
    </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import ImageDisplay from "../components/ImageDisplay.vue";
import MiniTitle from "../components/MiniTitle.vue";
import FooterPage from "./FooterPage.vue";

export default {
    components: {
        ImageDisplay,
        MiniTitle,
        FooterPage,
    },
    data: () => ({}),

    methods: {
        ...mapActions(["getEvents"]),

        openEventInformation(data) {
            this.$router.push("event-information/" + data.id);
        },
    },

    computed: {
        ...mapState(["allEvents"]),

        // events() {
        //     return this.allEvents;
        // },

        getAllEvents() {
            const all = [];
            this.allEvents.map((element) => {
                if (element.status == "All") {
                    all.push(element);
                }
            });
            return all.splice(0, 10);
        },

        upcomingEvents() {
            const upcoming = [];
            this.allEvents.map((element) => {
                if (element.status == "Upcoming") {
                    upcoming.push(element);
                }
            });
            return upcoming.splice(0, 3);
        },
    },
    mounted() {
        this.getEvents();
    },
};
</script>

<style lang="scss" scoped></style>
