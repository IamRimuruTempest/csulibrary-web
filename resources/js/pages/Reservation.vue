<template>
    <div>
        <v-container>
            <ImageDisplayVue />
            <MiniTitleVue title="Book Reservation" class="mt-16 mb-15" />

            <div v-if="userLoggedIn != null">
                <v-row v-for="(item, index) of books" :key="index" class="py-5">
                    <v-col cols="4">
                        <img
                            @click="openBookInformation(item)"
                            :src="`http://127.0.0.1:8000/book-cover/${item.book_image}`"
                            alt=""
                            width="100%"
                            height="400"
                            class="image"
                            style="cursor: pointer"
                        />
                    </v-col>
                    <v-col cols="8">
                        <h2>
                            {{ item.title }}
                        </h2>
                        <p class="text-left font-weight-medium">
                            {{ item.author }}
                        </p>
                        <p class="text-left">
                            {{ item.book_description.slice(0, 1000) }}...
                        </p>

                        <div class="d-flex align-center">
                            <p class="ma-0" style="color: red">
                                Cancel Reservation
                            </p>
                            <v-btn
                                @click="cancelReservation(item.isbn)"
                                icon
                                half-increments
                            >
                                <v-icon color="red">mdi-arrow-right</v-icon>
                            </v-btn>
                        </div>
                    </v-col>
                </v-row>
            </div>

            <NoAvailableInfo v-else />
        </v-container>
    </div>
</template>

<script>
import axios from "axios";
import { mapState } from "vuex";
import ImageDisplayVue from "../components/ImageDisplay.vue";
import MiniTitleVue from "../components/MiniTitle.vue";
import NoAvailableInfo from "../components/NoAvailableInfo.vue";
import moment from "moment";
export default {
    components: {
        ImageDisplayVue,
        MiniTitleVue,
        NoAvailableInfo,
    },

    data: () => ({
        books: [],
        date_today: new Date(),
    }),

    methods: {
        getUserReservation() {
            const user = this.loggedInUser;
            if (user != null) {
                axios({
                    method: "post",
                    url: "/api/get_user_reservation",
                    data: {
                        student_id: user.id,
                    },
                }).then((res) => {
                    this.books = res.data;

                    res.data.map((element) =>
                        this.getTwoDay(element.date_reserved, element.isbn)
                    );
                });
            }
        },

        getTwoDay(date, isbn) {
            const endDate = moment(this.date_today).format("YYYY-MM-DD HH:mm");
            const startDate = moment(date).format("YYYY-MM-DD HH:mm");
            // console.log(endDate, startDate);

            const oneDay = 24 * 60 * 60 * 1000;
            const parsedStartDate = new Date(startDate);
            const parsedEndDate = new Date(endDate);
            const differenceInDays = Math.round(
                Math.abs((parsedStartDate - parsedEndDate) / oneDay)
            );

            console.log(differenceInDays, "test");
            // return differenceInDays >= 1;

            if (differenceInDays < 2) {
                return false;
            } else {
                this.deleteOverDueReservation(isbn);
            }
        },

        deleteOverDueReservation(isbn) {
            axios({
                method: "post",
                url: "/api/update_user_reservation",
                data: {
                    isbn: isbn,
                },
            }).then((res) => {
                // console.log(res.data);
            });
        },

        openBookInformation(data) {
            this.$router.push("book-information/" + data.id);
        },

        cancelReservation(isbn) {
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, cancel it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios({
                        method: "post",
                        url: "/api/update_user_reservation",
                        data: {
                            isbn: isbn,
                        },
                    }).then((res) => {
                        this.$swal(
                            "Reserved Cancelation!",
                            "Your file has been canceled.",
                            "success"
                        );
                        this.getUserReservation();
                    });
                }
            });
        },
    },

    computed: {
        ...mapState(["loggedInUser"]),

        userLoggedIn() {
            return this.loggedInUser;
        },
    },

    mounted() {
        this.getUserReservation();
    },
};
</script>

<style scoped></style>
