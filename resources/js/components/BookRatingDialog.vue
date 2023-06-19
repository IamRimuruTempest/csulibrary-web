<template>
    <div>
        <v-overlay v-model="overlay" class="align-center justify-center">
            <v-progress-circular
                color="primary"
                indeterminate
                size="64"
            ></v-progress-circular>
        </v-overlay>
        <v-dialog v-model="showDialog" width="600" persistent>
            <v-card>
                <!-- <v-card-title class="text-h5 grey lighten-2">
                    Add Books
                </v-card-title> -->
                <v-toolbar class="mb-1" elevation="0">
                    <v-toolbar-title class="ml-2"
                        >Rate this book</v-toolbar-title
                    >

                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn icon @click="showDialog = false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>

                <v-card-text class="text-center">
                    <div class="text-center mt-6">
                        <img
                            height="350"
                            :src="`http://127.0.0.1:8000/book-cover/${items.book_image}`"
                            alt=""
                        />
                        <h2>The Light Beyond the Garden Wall</h2>
                        <h2>{{ items.title }}</h2>

                        <p>Scott Whitehead</p>
                        <p>{{ items.author }}</p>
                    </div>

                    <div class="text-center">
                        <v-rating
                            v-model="rating"
                            color="yellow darken-3"
                            hover
                            large
                        ></v-rating>
                    </div>
                </v-card-text>
                <v-card-actions class="align-center">
                    <v-btn color="primary" text @click="rateBook()">
                        Rate Now
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["value", "title", "items", "rbid", "userRating"],
    components: {},
    data: () => ({
        rating: 0,
        oldRating: 0,
        overlay: false,
    }),

    methods: {
        rateBook() {
            if (this.rating == 0) {
                this.$swal({
                    icon: "warning",
                    title: "Please speficy your rating",
                    text: "Rating information is not available as there is no record of you borrowing the book from the library.",
                    showConfirmButton: true,
                });
                return false;
            }
            if (this.title == "update") {
                this.updateRating();
            } else {
                this.editRating();
            }
        },

        updateRating() {
            axios({
                method: "post",
                url: "/api/update_ratings",
                data: {
                    rbid: this.rbid,
                    rating: this.rating,
                    isbn: this.items.isbn,
                },
            }).then((res) => {
                // console.log(res.data);
                // this.$emit("get-user-rating");

                // this.$emit("get-book-in-returned-books");
                // this.$emit("get-all-ratings");
                this.$emit("get-book");
                this.overlay = true;
                this.showDialog = false;
            });
        },

        editRating() {
            if (this.rating == this.oldRating) {
                this.showDialog = false;
                return false;
            } else {
                axios({
                    method: "post",
                    url: "/api/edit_ratings",
                    data: {
                        rbid: this.rbid,
                        rating: this.rating,
                        isbn: this.items.isbn,
                        oldrating: this.oldRating,
                    },
                }).then((res) => {
                    // this.$emit("get-user-rating");

                    // this.$emit("get-book-in-returned-books");
                    // this.$emit("get-all-ratings");

                    this.$emit("get-book");
                    this.overlay = true;
                    this.showDialog = false;
                });
            }
        },
    },

    computed: {
        showDialog: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit("input", value);
            },
        },
    },

    watch: {
        showDialog() {
            if (this.title != "update") {
                this.rating = this.userRating;
                this.oldRating = this.userRating;
                console.log(this.title);
            } else {
                console.log(this.title);
            }
        },
        overlay(val) {
            val &&
                setTimeout(() => {
                    this.overlay = false;
                    this.$swal({
                        icon: "success",
                        title: "Successfully Rated",
                        text: "You have successfully rated the book.",
                        showConfirmButton: false,
                        timer: 3000,
                    });
                }, 3000);
        },
    },
};
</script>

<style lang="scss" scoped></style>
