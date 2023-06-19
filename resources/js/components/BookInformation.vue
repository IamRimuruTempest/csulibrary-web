<template>
    <div>
        <v-container>
            <div
                style="
                    display: grid;
                    grid-template-columns: 300px 1fr;
                    gap: 2rem;
                "
            >
                <div>
                    <div style="position: sticky; top: 13rem">
                        <img
                            :src="`http://127.0.0.1:8000/book-cover/${book.book_image}`"
                            :alt="book.title"
                            width="100%"
                            height="500"
                            class="image"
                        />

                        <div class="text-center">
                            <div
                                v-if="
                                    totalUserRated == 0 ||
                                    checkUserLoggedIn == null
                                "
                                class="d-flex align-center justify-center"
                            >
                                <!-- <p class="ma-0">Rate this book</p> -->
                                <v-btn
                                    color="#8b0304"
                                    dark
                                    elevation="0"
                                    block
                                    width="100%"
                                    tile
                                    @click="ratingInsertUpdate(book.isbn)"
                                >
                                    Rate this book
                                </v-btn>
                            </div>
                            <div
                                v-else
                                class="d-flex align-center justify-center"
                            >
                                <!-- <p class="ma-0">Update rating</p> -->
                                <v-btn
                                    color="#8b0304"
                                    dark
                                    elevation="0"
                                    block
                                    width="100%"
                                    tile
                                    @click="ratingInsertUpdate()"
                                >
                                    Update Rating
                                </v-btn>
                            </div>

                            <div class="d-flex align-center justify-center">
                                <!-- <p class="ma-0">Reserve this book</p> -->
                                <v-btn
                                    color="#8b0304"
                                    outlined
                                    elevation="0"
                                    block
                                    width="100%"
                                    tile
                                    class="mt-2"
                                    @click="
                                        clickReservation(book.isbn, book.status)
                                    "
                                >
                                    Reserve Book
                                </v-btn>
                            </div>

                            <v-rating
                                v-model="totalUserRating"
                                readonly
                                size="40"
                            ></v-rating>
                        </div>
                    </div>
                </div>
                <div class="mt-15">
                    <div>
                        <h1>{{ this.book.title }}</h1>
                        <p>{{ this.book.author }}</p>
                        <div class="text-left d-flex align-center">
                            <v-rating
                                v-model="allRatings"
                                readonly
                                half-increments
                                color="#8b0304"
                                size="40"
                            ></v-rating>

                            <h1 class="mx-8">{{ allRatings }}</h1>

                            <p v-if="allRatings != 0" class="mb-0 mx-8">
                                {{ ratings.combineRating }} ratings
                            </p>
                            <p v-else class="mb-0 mx-8">No ratings yet</p>
                            <p
                                v-if="allRatingsTotalRated != 0"
                                class="mb-0 mx-8"
                            >
                                {{ allRatingsTotalRated }} reviews
                            </p>
                            <p v-else class="mb-0 mx-8">No reviews yet</p>
                        </div>

                        <p>
                            <b> Genres: </b> <u>{{ this.book.category }}</u>
                        </p>

                        <p>
                            <b>Description:</b> {{ this.book.book_description }}
                        </p>

                        <div class="my-12">
                            <h3>About the author</h3>
                            <div class="d-flex align-center my-5">
                                <v-avatar size="80">
                                    <img
                                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                                        alt="John"
                                    />
                                </v-avatar>
                                <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-title
                                            >Brandon
                                            Sanderson</v-list-item-title
                                        >
                                        <v-list-item-subtitle
                                            >400 Books</v-list-item-subtitle
                                        >
                                    </v-list-item-content>
                                </v-list-item>
                            </div>
                            <p>
                                Brandon’s major books for the second half of
                                2016 are The Dark Talent, the final volume in
                                Alcatraz Smedry’s autobiographical account of
                                his battle against the Evil Librarians who
                                secretly rule our world, and Arcanum Unbounded,
                                the collection of short fiction in the Cosmere
                                universe that includes the Mistborn series and
                                the Stormlight Archive, among others. This
                                collection features The Emperor’s Soul,
                                Mistborn: Secret History, and a brand-new
                                Stormlight Archive novella, Edgedancer. Earlier
                                this year he released Calamity, the finale of
                                the #1 New York Times bestselling Reckoners
                                trilogy that began with Steelheart . Brandon
                                Sanderson was born in 1975 in Lincoln, Nebraska.
                                As a child Brandon enjoyed reading, but he lost
                                interest in the types of titles often suggested
                                to him, and by junior high he never cracked a
                                book if he could help it. This changed when an
                                eighth grade teacher gave him Dragonsbane by
                                Barbara Hambly.
                            </p>
                        </div>

                        <hr />
                        <div class="my-10">
                            <h3>Ratings & Review</h3>

                            <div
                                class="d-flex align-center justify-center flex-column"
                            >
                                <v-icon size="60"
                                    >mdi-book-open-page-variant-outline</v-icon
                                >
                                <h3>What do you think?</h3>
                                <div
                                    class="d-flex align-center justify-center flex-row"
                                    style="gap: 1rem"
                                >
                                    <div class="text-center">
                                        <v-rating
                                            v-model="totalUserRating"
                                            readonly
                                            size="30"
                                        ></v-rating>
                                        <p
                                            v-if="
                                                totalUserRated == 0 ||
                                                checkUserLoggedIn == null
                                            "
                                            class="ma-0"
                                        >
                                            Rate this book
                                        </p>

                                        <p v-else class="ma-0">Update rating</p>
                                    </div>
                                    <div>
                                        <v-btn
                                            v-if="
                                                totalUserReview == 0 ||
                                                checkUserLoggedIn == null
                                            "
                                            elevation="0"
                                            color="#000"
                                            dark
                                            border="20"
                                            @click="reviewInsertUpdate()"
                                            >Write a Review</v-btn
                                        >

                                        <v-btn
                                            v-else
                                            elevation="0"
                                            color="#000"
                                            dark
                                            border="20"
                                            @click="reviewInsertUpdate()"
                                            >Update Review</v-btn
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <h2 class="my-6">Community Reviews</h2>
                        <div class="text-left d-flex align-center">
                            <v-rating
                                v-model="allRatings"
                                readonly
                                half-increments
                                color="#8b0304"
                                size="40"
                            ></v-rating>

                            <h1 class="mx-8">{{ allRatings }}</h1>

                            <p v-if="allRatings != 0" class="mb-0 mx-8">
                                {{ ratings.combineRating }} ratings
                            </p>
                            <p v-else class="mb-0 mx-8">No ratings yet</p>
                            <p
                                v-if="allRatingsTotalRated != 0"
                                class="mb-0 mx-8"
                            >
                                {{ allRatingsTotalRated }} reviews
                            </p>
                            <p v-else class="mb-0 mx-8">No reviews yet</p>
                        </div>
                        <v-card elevation="0">
                            <v-list>
                                <v-list-item class="d-flex flex-row">
                                    <p style="width: 150px" class="mb-0">
                                        5 stars
                                    </p>

                                    <v-progress-linear
                                        v-model="ratings.rating5"
                                        color="amber"
                                        height="25"
                                        width="100%"
                                    ></v-progress-linear>
                                    <p
                                        v-if="allRatings != 0"
                                        style="width: 150px"
                                        class="mb-0 text-right"
                                    >
                                        {{ ratings.rating5 }} &nbsp; &nbsp; ({{
                                            this.percentage.percentage5
                                        }}%)
                                    </p>
                                </v-list-item>
                                <v-list-item class="d-flex flex-row">
                                    <p style="width: 150px" class="mb-0">
                                        4 stars
                                    </p>

                                    <v-progress-linear
                                        v-model="ratings.rating4"
                                        color="amber"
                                        height="25"
                                        width="100%"
                                    ></v-progress-linear>
                                    <p
                                        v-if="allRatings != 0"
                                        style="width: 150px"
                                        class="mb-0 text-right"
                                    >
                                        {{ ratings.rating4 }} &nbsp; &nbsp; ({{
                                            this.percentage.percentage4
                                        }}%)
                                    </p>
                                </v-list-item>
                                <v-list-item class="d-flex flex-row">
                                    <p style="width: 150px" class="mb-0">
                                        3 stars
                                    </p>

                                    <v-progress-linear
                                        v-model="ratings.rating3"
                                        color="amber"
                                        height="25"
                                        width="100%"
                                    ></v-progress-linear>
                                    <p
                                        v-if="allRatings != 0"
                                        style="width: 150px"
                                        class="mb-0 text-right"
                                    >
                                        {{ ratings.rating3 }} &nbsp; &nbsp; ({{
                                            this.percentage.percentage3
                                        }}%)
                                    </p>
                                </v-list-item>
                                <v-list-item class="d-flex flex-row">
                                    <p style="width: 150px" class="mb-0">
                                        2 stars
                                    </p>

                                    <v-progress-linear
                                        v-model="ratings.rating2"
                                        color="amber"
                                        height="25"
                                        width="100%"
                                    ></v-progress-linear>
                                    <p
                                        v-if="allRatings != 0"
                                        style="width: 150px"
                                        class="mb-0 text-right"
                                    >
                                        {{ ratings.rating2 }} &nbsp; &nbsp; ({{
                                            this.percentage.percentage2
                                        }}%)
                                    </p>
                                </v-list-item>
                                <v-list-item class="d-flex flex-row">
                                    <p style="width: 150px" class="mb-0">
                                        1 stars
                                    </p>

                                    <v-progress-linear
                                        v-model="ratings.rating1"
                                        color="amber"
                                        height="25"
                                        width="100%"
                                    ></v-progress-linear>
                                    <p
                                        v-if="allRatings != 0"
                                        style="width: 150px"
                                        class="mb-0 text-right"
                                    >
                                        {{ ratings.rating1 }} &nbsp; &nbsp; ({{
                                            this.percentage.percentage1
                                        }}%)
                                    </p>
                                </v-list-item>
                            </v-list>
                        </v-card>

                        <div>
                            <h3>Reviews</h3>
                            <div
                                v-for="(review, i) of bookReview"
                                :key="i"
                                class="d-flex mt-5"
                                style="gap: 1rem"
                            >
                                <div class="d-flex">
                                    <!-- <v-avatar size="60">
                                        <img
                                            :src="`http://127.0.0.1:8000/profiles/${review.image}`"
                                            :alt="review.first_name"
                                        />
                                    </v-avatar> -->
                                    <td>
                                        <v-avatar v-if="review.image != null">
                                            <img
                                                width="50px"
                                                height="100%"
                                                :src="`/profiles/${review.image}`"
                                            />
                                        </v-avatar>
                                        <v-avatar v-else color="indigo">
                                            <v-icon dark>
                                                mdi-account-circle
                                            </v-icon>
                                        </v-avatar>
                                    </td>
                                </div>
                                <div>
                                    <h3 class="ml-2">
                                        {{ review.first_name }}
                                        {{ review.middle_name }}
                                        {{ review.last_name }}
                                        {{ review.suffix }}
                                    </h3>
                                    <v-rating
                                        v-model="review.total"
                                        class="text-left"
                                        active-color="yellow-accent-4"
                                        readonly
                                        color="#8b0304"
                                        size="20"
                                    ></v-rating>
                                    <p class="ml-2">
                                        {{ review.review }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </v-container>
        <BookRatingDialogVue
            v-model="ratingUpdateDialog"
            title="update"
            :items="book"
            :rbid="rbid"
            @get-book="getBook()"
        />
        <!-- @get-book-in-returned-books="getBookInReturnedBooks()"
            @get-all-ratings="getAllRatings()"
            @get-all-reviews="getAllReviews()" -->

        <BookRatingDialogVue
            v-model="ratingEditDialog"
            title="edit"
            :items="book"
            :rbid="rbid"
            :userRating="totalUserRating"
            @get-book="getBook()"
        />

        <!-- @get-book-in-returned-books="getBookInReturnedBooks()"
            @get-all-ratings="getAllRatings()"
            @get-all-reviews="getAllReviews()" -->

        <BookReviewDialogVue
            v-model="reviewInsertDialog"
            title="insert"
            :items="book"
            :rbid="rbid"
            @get-book="getBook()"
        />

        <!-- @get-book-in-returned-books="getBookInReturnedBooks()"
            @get-book-reviews="getAllReviews()" -->

        <BookReviewDialogVue
            v-model="reviewUpdateDialog"
            title="update"
            :items="userReviewArr"
            @get-book="getBook()"
        />

        <!-- @get-book-reviews="getAllReviews()" -->
    </div>
</template>

<script>
import axios from "axios";
import { mapState, mapActions } from "vuex";
import BookRatingDialogVue from "./BookRatingDialog.vue";
import BookReviewDialogVue from "./BookReviewDialog.vue";
export default {
    props: [],
    components: {
        BookRatingDialogVue,
        BookReviewDialogVue,
    },
    data: () => ({
        book: {},
        id: null,
        rbid: null,
        ratingUpdateDialog: false,
        ratingEditDialog: false,
        reviewInsertDialog: false,
        reviewUpdateDialog: false,

        allRatings: 0,
        allRatingsTotalRated: 0,
        ratings: {},
        percentage: {},

        bookReview: [],

        bookReturnedArr: [],
        totalUserReview: 0,
        totalUserRating: 0,
        totalUserRated: 0,
        userReviewArr: [],

        userReservation: 0,
    }),

    methods: {
        getBook() {
            this.id = this.$route.params.id;
            axios({
                method: "post",
                url: "/api/getBookByID",
                data: {
                    id: this.id,
                },
            }).then((res) => {
                this.book = res.data[0];
                // console.log(this.book, "test book");
                this.getAllRatings();
                this.getAllReviews();
                this.getBookInReturnedBooks();
            });
        },

        getAllRatings() {
            axios({
                method: "post",
                url: "/api/getAllRatings",
                data: {
                    isbn: this.book.isbn,
                },
            }).then((res) => {
                if (res.data != 0) {
                    const data = res.data[0];
                    const average = data.average;
                    this.allRatings = parseFloat(average.toFixed(1));
                    this.allRatingsTotalRated = data.total_rated;
                    this.ratings = {
                        rating1: data.rating1,
                        rating2: data.rating2 / 2,
                        rating3: data.rating3 / 3,
                        rating4: data.rating4 / 4,
                        rating5: data.rating5 / 5,
                        combineRating:
                            data.rating1 +
                            data.rating2 / 2 +
                            data.rating3 / 3 +
                            data.rating4 / 4 +
                            data.rating5 / 5,
                    };
                    this.percentage = {
                        percentage1: (data.rating1 / 100) * 100,
                        percentage2: (data.rating2 / 100) * 100,
                        percentage3: (data.rating3 / 100) * 100,
                        percentage4: (data.rating4 / 100) * 100,
                        percentage5: (data.rating5 / 100) * 100,
                    };
                } else {
                    this.allRatings = 0;
                    this.allRatingsTotalRated = 0;
                }
            });
        },

        getAllReviews() {
            const user = this.loggedInUser;

            axios({
                method: "post",
                url: "/api/book_reviews",
                data: {
                    bookid: this.id,
                    isbn: this.book.isbn,
                },
            }).then((res) => {
                this.bookReview = res.data;

                if (user != null) {
                    this.userReviewArr = this.bookReview.filter((element) => {
                        if (element.student_id == user.id) {
                            return element;
                        }
                    });
                }
            });
        },

        ratingInsertUpdate() {
            if (this.checkUserLoggedIn == null) {
                this.$swal({
                    icon: "warning",
                    title: "Login Required",
                    text: "Please login first!",
                    showConfirmButton: true,
                });
                return false;
            }

            if (this.bookReturnedArr.length == 0) {
                this.$swal({
                    icon: "warning",
                    title: "Review Unavailable",
                    text: "Reviewing the book is not available as there is no record of you borrowing the book from the library.",
                    showConfirmButton: true,
                });
                return false;
            } else {
                if (this.totalUserRated != 1) {
                    this.ratingUpdateDialog = true;
                } else {
                    this.ratingEditDialog = true;
                }
            }
        },

        reviewInsertUpdate() {
            if (this.checkUserLoggedIn == null) {
                this.$swal({
                    icon: "warning",
                    title: "Login Required",
                    text: "Please login first!",
                    showConfirmButton: true,
                });
                return false;
            }

            if (this.bookReturnedArr.length == 0) {
                this.$swal({
                    icon: "warning",
                    title: "Review Unavailable",
                    text: "Reviewing the book is not available as there is no record of you borrowing the book from the library.",
                    showConfirmButton: true,
                });
                return false;
            } else {
                if (this.totalUserReview != 1) {
                    this.reviewInsertDialog = true;
                } else {
                    this.reviewUpdateDialog = true;
                }
            }
        },

        getBookInReturnedBooks() {
            const user = this.loggedInUser;

            if (user != null) {
                axios({
                    method: "post",
                    url: "/api/getReturnedBookByID",
                    data: {
                        bookid: this.book.isbn,
                        userid: user.id,
                    },
                }).then((res) => {
                    this.bookReturnedArr = res.data;
                    // console.log(this.bookReturnedArr, "this.bookReturnedArr");
                    this.rbid = res.data.length !== 0 ? res.data[0].id : null;
                    this.totalUserReview =
                        res.data.length !== 0 ? res.data[0].reviewed : 0;
                    this.totalUserRating =
                        res.data.length !== 0 ? res.data[0].total : 0;
                    this.totalUserRated =
                        res.data.length !== 0 ? res.data[0].rated : 0;
                });
            }
        },

        clickReservation(isbn, status) {
            if (this.checkUserLoggedIn == null) {
                this.$swal({
                    icon: "warning",
                    title: "Login Required",
                    text: "Please login first!",
                    showConfirmButton: true,
                });
                return false;
            }

            if (status != "Unavailable") {
                if (this.userReservation.length < 3) {
                    const item = isbn;
                    this.reserveBook(item);
                } else {
                    this.$swal({
                        icon: "warning",
                        title: "Book Reservation Notice",
                        text: "Please be advice that you can only allow to reserve three books.",
                        showConfirmButton: true,
                    });
                }
            } else {
                this.$swal({
                    icon: "warning",
                    title: "Book Reservation Notice",
                    text: "The book you're trying to reserve is unavaible as of the moment!",
                    showConfirmButton: true,
                });
            }
        },

        reserveBook(item) {
            const user = this.loggedInUser;
            if (user != null) {
                axios({
                    method: "post",
                    url: "/api/reservations",
                    data: {
                        isbn: item,
                    },
                }).then((res) => {
                    // console.log(res.data);
                    if (res.data.length != 0) {
                        this.$swal({
                            icon: "success",
                            title: "Book Reservation Successful",
                            text: "Please be advice that you can only reserved the book for 1 day.",
                            showConfirmButton: true,
                        });
                        this.insertToReservation(item, user.id);
                        return false;
                    } else {
                        this.$swal({
                            icon: "warning",
                            title: "Book is reserved",
                            text: "The book is currently in reservation.",
                            showConfirmButton: true,
                        });
                        return false;
                    }
                });
            }
        },

        insertToReservation(item, id) {
            axios({
                method: "post",
                url: "/api/insert_reservations",
                data: {
                    isbn: item,
                    student_id: id,
                },
            }).then((res) => {
                // console.log(res.data, "test");
            });
        },

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
                    this.userReservation = res.data;
                    console.log(this.userReservation, "test");
                });
            }
        },
    },

    computed: {
        ...mapState(["loggedInUser"]),

        checkUserLoggedIn() {
            return this.loggedInUser;
        },
    },
    created() {},
    mounted() {
        this.getBook();
        this.getUserReservation();
    },
};
</script>

<style scoped>
.sticky-top {
    height: 100px;
    position: sticky;
    top: 0;
}
</style>
