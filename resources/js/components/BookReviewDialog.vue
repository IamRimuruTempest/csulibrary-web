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
                <v-toolbar class="mb-1" elevation="0">
                    <v-toolbar-title class="ml-2"
                        >Review this book</v-toolbar-title
                    >

                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn icon @click="showDialog = false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>

                <v-card-text class="text-left">
                    Remember to keep comments respectful and to follow our
                    Community Guidelines

                    <v-form>
                        <v-textarea
                            v-model="review"
                            class="my-5"
                            outlined
                            clearable
                            clear-icon="mdi-close-circle"
                            name="input-7-4"
                            label="Review and Comments"
                            hide-details=""
                            auto-grow
                            rows="4"
                            row-height="50"
                        ></v-textarea>
                        <v-btn
                            color="primary"
                            block
                            @click="insertUpdateReview()"
                        >
                            Submit
                        </v-btn>
                    </v-form>
                </v-card-text>
                <!-- <v-card-actions class="align-center">
                    <v-btn color="primary" text @click="rateBook()">
                        Rate Now
                    </v-btn>
                </v-card-actions> -->
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import axios from "axios";

import { mapState, mapActions } from "vuex";
export default {
    props: ["value", "title", "items"],
    components: {},
    data: () => ({
        review: null,
        overlay: false,

        overlay_title: "",
        overlay_text: "",
    }),

    methods: {
        insertUpdateReview() {
            const user = this.loggedInUser;

            if (this.title == "insert") {
                axios({
                    method: "post",
                    url: "/api/insert_review",
                    data: {
                        studentid: user.id,
                        bookid: this.items.id,
                        review: this.review,
                        isbn: this.items.isbn,
                    },
                }).then((res) => {
                    console.log(res.data);
                    // this.$emit("get-book-in-returned-books");
                    // this.$emit("get-book-reviews");
                    this.$emit("get-book");
                    this.overlay = true;
                    this.showDialog = false;
                });
            } else {
                axios({
                    method: "post",
                    url: "/api/update_review",
                    data: {
                        id: this.items[0].id,
                        review: this.review,
                    },
                }).then((res) => {
                    // this.$emit("get-book-in-returned-books");
                    // this.$emit("get-book-reviews");
                    this.$emit("get-book");
                    this.overlay = true;
                    this.showDialog = false;
                });
            }
        },
    },

    computed: {
        ...mapState(["loggedInUser"]),

        showDialog: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit("input", value);
            },
        },
    },

    created() {},

    watch: {
        showDialog() {
            if (this.title == "update") {
                this.review = this.items[0].review;
                this.overlay_title = "Successfully Reviewed";
                this.overlay_text = "You have successfully reviewed the book.";
            } else {
                this.overlay_title = "Successfully Rated";
                this.overlay_text = "You have successfully rated the book.";
            }
        },
        overlay(val) {
            val &&
                setTimeout(() => {
                    this.overlay = false;
                    this.$swal({
                        icon: "success",
                        title: this.overlay_title,
                        text: this.overlay_text,
                        showConfirmButton: false,
                        timer: 3000,
                    });
                }, 3000);
        },
    },
};
</script>

<style lang="scss" scoped></style>
