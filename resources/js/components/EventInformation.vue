<template>
    <div>
        <v-container>
            <v-row>
                <v-col class="mt-5" cols="9">
                    <img
                        class="mb-6"
                        width="100%"
                        height="550"
                        :src="`http://127.0.0.1:8000/events/${events.image}`"
                        :alt="events.title"
                    />
                    <p class="mb-0">{{ events.date }} @ {{ events.time }}</p>
                    <h2>
                        {{ events.title }}
                    </h2>
                    <p>
                        {{ events.location }}
                    </p>
                    <p>
                        {{ events.description }}
                    </p>
                </v-col>
                <v-col
                    cols="3"
                    class="mt-8"
                    style="background-color: #fde8d1; border-radius: 5px"
                >
                    <h3 class="mb-3">Featured Events</h3>

                    <div v-for="(item, index) of featuredEvents" :key="index">
                        <v-card
                            v-if="item.id != $route.params.id"
                            color="#fde8d1"
                            tile
                            elevation="0"
                            class="mb-5"
                        >
                            <img
                                width="100%"
                                height="150"
                                :src="`http://127.0.0.1:8000/events/${item.image}`"
                                alt=""
                                style="border-radius: 5px; cursor: pointer"
                                @click="openEventInformation(item)"
                            />
                            <p style="font-size: 0.8rem">
                                {{ item.title }}
                            </p>
                        </v-card>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import axios from "axios";
export default {
    data: () => ({
        events: [],
    }),

    methods: {
        ...mapActions(["getEvents"]),
        getEventsByID() {
            const uid = this.$route.params.id;
            axios({
                method: "post",
                url: "/api/getEventByID",
                data: {
                    id: uid,
                },
            }).then((res) => {
                this.events = res.data.length !== 0 ? res.data[0] : [];
            });
        },

        openEventInformation(data) {
            this.$router.push("/featured-events/" + data.id);
            location.reload();
        },
    },

    computed: {
        ...mapState(["allEvents"]),

        featuredEvents() {
            const featured = [];
            this.allEvents.map((element) => {
                if (element.status == "Featured") {
                    featured.push(element);
                }
            });
            return featured.splice(0, 5);
        },
    },

    mounted() {
        this.getEventsByID();
        this.getEvents();
    },
};
</script>

<style lang="scss" scoped></style>
