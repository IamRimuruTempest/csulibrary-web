<template>
    <div class="ma-15 mb-0">
        <v-container>
            <v-card color="#fde8d1" class="pa-5" tile elevation="0">
                <MiniTitle title="What's New" />
                <div v-for="(item, index) of featuredEvents" :key="index">
                    <v-card
                        v-if="index % 2 == 0"
                        tile
                        color="transparent"
                        elevation="0"
                        class="mt-15"
                    >
                        <v-row>
                            <v-col cols="6">
                                <img
                                    :src="`http://127.0.0.1:8000/events/${item.image}`"
                                    alt=""
                                    width="100%"
                                    height="350"
                                    class="image"
                                    style="cursor: pointer"
                                    @click="openEventInformation(item)"
                                />
                            </v-col>
                            <v-col cols="6">
                                <span>{{ item.subtitle }}</span>
                                <h1 class="text-uppercase text">
                                    {{ item.title }}
                                </h1>
                                <p>Sat., {{ item.date }} {{ item.time }}</p>
                                <p>{{ item.description.slice(0, 500) }}...</p>

                                <ArrowButton color="#8b0304" />
                            </v-col>
                        </v-row>
                    </v-card>
                    <v-card
                        v-else
                        tile
                        color="transparent"
                        elevation="0"
                        class="mt-15"
                    >
                        <v-row>
                            <v-col cols="6">
                                <span>{{ item.subtitle }}</span>
                                <h1 class="text-uppercase text">
                                    {{ item.title }}
                                </h1>
                                <p>Sat., {{ item.date }} {{ item.time }}</p>
                                <p>
                                    {{ item.description.slice(0, 500) }}
                                </p>

                                <ArrowButton color="#8b0304" />
                            </v-col>
                            <v-col cols="6">
                                <img
                                    :src="`http://127.0.0.1:8000/events/${item.image}`"
                                    alt=""
                                    width="100%"
                                    height="350"
                                    class="image"
                                    style="cursor: pointer"
                                    @click="openEventInformation(item)"
                                />
                            </v-col>
                        </v-row>
                    </v-card>
                </div>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import ArrowButton from "../../components/ArrowButton.vue";
import MiniTitle from "../../components/MiniTitle.vue";
import { mapActions, mapState } from "vuex";

export default {
    components: {
        ArrowButton,
        MiniTitle,
    },

    methods: {
        ...mapActions(["getEvents"]),

        openEventInformation(data) {
            this.$router.push("event-information/" + data.id);
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
            return featured.splice(0, 4);
        },
    },

    mounted() {
        this.getEvents();
    },
};
</script>

<style scoped>
.image {
    filter: grayscale(100%);
    -webkit-filter: grayscale(100%);
    transition: 0.5s;
}
.image:hover {
    filter: grayscale(0%);
    -webkit-filter: grayscale(0%);
    transition: 0.5s;
}
</style>
