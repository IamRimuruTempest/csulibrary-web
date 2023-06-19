<template>
    <div>
        <v-container>
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Top Rated" />

                <v-card class="mt-5" elevation="0">
                    <v-row>
                        <v-col
                            v-for="item of books"
                            :key="item.id"
                            class="py-10"
                            @click="openBookInformation(item)"
                        >
                            <img
                                :src="`http://127.0.0.1:8000/book-cover/${item.book_image}`"
                                :alt="item.title"
                                width="100%"
                                height="350"
                                class="image"
                            />
                            <p class="mt-4 mb-0 text-center font-weight-bold">
                                {{ item.title }}
                            </p>
                            <p class="text-center">{{ item.author }}</p>
                            <v-rating
                                v-model="item.average"
                                class="text-center"
                                readonly
                                half-increments
                                color="#8b0304"
                                size="15"
                            ></v-rating>
                        </v-col>
                        <!-- <v-col class="py-10">
                            <img
                                src="https://images-platform.99static.com//PiHWJxAcOnC7gw197YEXKtyxDXQ=/fit-in/500x500/99designs-contests-attachments/39/39493/attachment_39493946"
                                alt=""
                                width="100%"
                                height="300"
                                class="image"
                            />
                            <p class="mt-4 mb-0 text-center font-weight-bold">
                                The Tempset - Tide of Seasons
                            </p>
                            <p class="text-center">Aaron James Holand</p>
                        </v-col>
                        <v-col class="py-10">
                            <img
                                src="https://i.pinimg.com/550x/05/6b/ed/056bedc9cc84830310811dcbb1da938d.jpg"
                                alt=""
                                width="100%"
                                height="300"
                                class="image"
                            />
                            <p class="mt-4 mb-0 text-center font-weight-bold">
                                Curse of Shadows and Thorns
                            </p>
                            <p class="text-center">LJ Andrews</p>
                        </v-col>
                        <v-col class="py-10">
                            <img
                                src="https://self-publishingschool.com/wp-content/uploads/2021/07/fantasy-book-cover-design-example-2-e1652364383267.png"
                                alt=""
                                width="100%"
                                height="300"
                                class="image"
                            />
                            <p class="mt-4 mb-0 text-center font-weight-bold">
                                The Priory of the Orange Tree
                            </p>
                            <p class="text-center">Samantha Shannon</p>
                        </v-col>
                        <v-col class="py-10">
                            <img
                                src="https://pbs.twimg.com/media/De3rCDJUcAAss_G?format=jpg&name=4096x4096"
                                alt=""
                                width="100%"
                                height="300"
                                class="image"
                            />
                            <p class="mt-4 mb-0 text-center font-weight-bold">
                                Auring's Wrath
                            </p>
                            <p class="text-center">Justin Depaoli</p>
                        </v-col>
                        <v-col class="py-10">
                            <img
                                src="https://www.bookcoversart.com/wp-content/uploads/2019/11/High-Epic-Dark-Fantasy-Premade-Book-Cover-Shadow-of-the-Wizard.jpg"
                                alt=""
                                width="100%"
                                height="300"
                                class="image"
                            />
                            <p class="mt-4 mb-0 text-center font-weight-bold">
                                Shadow of the Wizard
                            </p>
                            <p class="text-center">John Premade</p>
                        </v-col> -->
                    </v-row>
                </v-card>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import ArrowButton from "../../components/ArrowButton.vue";
import MiniTitle from "../../components/MiniTitle.vue";
import BookInformation from "../../components/BookInformation.vue";
import { mapActions, mapState } from "vuex";
export default {
    components: {
        ArrowButton,
        MiniTitle,
        BookInformation,
    },

    data: () => ({
        books: [],
    }),

    methods: {
        ...mapActions(["getBooks"]),

        openBookInformation(data) {
            this.$router.push("book-information/" + data.id);
        },

        getHighestRating() {
            axios({
                method: "post",
                url: "/api/get_highest_rating",
            }).then((res) => {
                this.books = res.data;
                console.log(this.books, "tse tesgjgo");
            });
        },
    },

    computed: {},

    mounted() {
        this.getHighestRating();
    },
};
</script>

<style scoped>
.image {
    transition: 0.5s;
}

.image:hover {
    transition: 0.5s;
    transform: scale(1.1);
    cursor: pointer;
}
</style>
