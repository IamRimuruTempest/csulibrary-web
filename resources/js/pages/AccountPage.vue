<template>
    <div>
        <v-overlay v-model="overlay" class="align-center justify-center">
            <v-progress-circular
                color="primary"
                indeterminate
                size="64"
            ></v-progress-circular>
        </v-overlay>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Account" />
                <v-card class="mt-5" elevation="0">
                    <h2 class="text-uppercase text">Secure your account</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                    </p>

                    <div>
                        <v-row class="my-15" v-if="checkUserLoggedIn == null">
                            <v-col>
                                <v-btn
                                    color="#c4d8e5"
                                    block
                                    x-large
                                    elevation="0"
                                    tile
                                    height="70"
                                    style="font-size: 1.5rem; font-weight: bold"
                                    @click="displayLogin()"
                                    >Login
                                </v-btn>
                            </v-col>
                            <v-col>
                                <v-btn
                                    color="#e1dd7c"
                                    block
                                    x-large
                                    elevation="0"
                                    tile
                                    height="70"
                                    style="font-size: 1.5rem; font-weight: bold"
                                    @click="displayRegister()"
                                    >Register</v-btn
                                >
                            </v-col>
                        </v-row>
                        <v-row class="my-15" v-else>
                            <v-col>
                                <v-btn
                                    color="#c4d8e5"
                                    block
                                    x-large
                                    elevation="0"
                                    tile
                                    height="70"
                                    style="font-size: 1.5rem; font-weight: bold"
                                    @click="Logout()"
                                    >Logout
                                </v-btn>
                            </v-col>
                        </v-row>
                    </div>
                </v-card>
            </v-card>

            <div v-if="checkUserLoggedIn == null">
                <div v-if="login == true">
                    <h2 class="text-uppercase text">Library Login Form</h2>
                    <p>Please login to your account</p>

                    <v-card class="my-10" elevation="0">
                        <v-form>
                            <v-text-field
                                label="Username"
                                v-model="username"
                                outlined
                                dense
                                prepend-inner-icon="mdi-account-outline"
                                style="width: 50%"
                            ></v-text-field>
                            <v-text-field
                                label="Password"
                                v-model="password"
                                outlined
                                dense
                                prepend-inner-icon="mdi-lock-outline"
                                append-icon="mdi-eye-outline"
                                style="width: 50%"
                            ></v-text-field>
                            <v-btn
                                @click="Login()"
                                color="primary"
                                tile
                                elevation="0"
                                style="width: 50%"
                                >Login</v-btn
                            >
                        </v-form>
                    </v-card>
                </div>

                <div v-else>
                    <h2 class="text-uppercase text">
                        Library Registration Form
                    </h2>
                    <p>Fill out the form carefully for registration</p>
                    <v-card class="my-10" elevation="0">
                        <v-form @submit.prevent="Register" ref="form">
                            <v-text-field
                                label="First Name"
                                v-model="user.firstname"
                                outlined
                                dense
                                style="width: 50%"
                                :rules="rules"
                            ></v-text-field>
                            <v-text-field
                                label="Middle Name"
                                v-model="user.middlename"
                                outlined
                                dense
                                style="width: 50%"
                                :rules="rules"
                            ></v-text-field>

                            <v-row style="gap: 0.7rem" class="pb-0">
                                <v-col cols="4" class="pb-0">
                                    <v-text-field
                                        label="Last Name"
                                        v-model="user.lastname"
                                        outlined
                                        dense
                                        :rules="rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="2" class="pb-0">
                                    <!-- <v-text-field
                                        label="Suffix"
                                        v-model="user.suffix"
                                        outlined
                                        dense
                                    ></v-text-field> -->
                                    <v-autocomplete
                                        v-model="user.suffix"
                                        label="Suffix"
                                        :items="[
                                            'Jr',
                                            'Sr',
                                            'I',
                                            'II',
                                            'III',
                                            'IV',
                                        ]"
                                        clearable
                                        hide-details
                                        outlined
                                        dense
                                        class="pt-0 mb-3"
                                    ></v-autocomplete>
                                </v-col>
                            </v-row>

                            <v-row style="gap: 0.7rem">
                                <v-col cols="3" class="pt-0 pb-0">
                                    <v-autocomplete
                                        v-model="user.gender"
                                        label="Gender"
                                        :items="['Male', 'Female']"
                                        clearable
                                        hide-details
                                        outlined
                                        dense
                                        class="pt-0 mb-3"
                                        :rules="rules"
                                    ></v-autocomplete>
                                </v-col>
                                <v-col cols="3" class="pt-0 pb-0">
                                    <v-text-field
                                        label="Phone Number"
                                        v-model="user.phone"
                                        v-mask="'+63-###-###-####'"
                                        outlined
                                        dense
                                        :rules="rules"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-row style="gap: 0.7rem">
                                <v-col cols="5" class="pt-0">
                                    <v-text-field
                                        label="Identification (ID)"
                                        v-model="user.identification"
                                        v-mask="'##-######'"
                                        outlined
                                        dense
                                        :rules="rules"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="1" class="pt-0">
                                    <v-text-field
                                        label="Year"
                                        v-model="user.year"
                                        v-mask="'#'"
                                        outlined
                                        dense
                                        :rules="rules"
                                    ></v-text-field>
                                </v-col>
                            </v-row>

                            <v-text-field
                                label="Course"
                                v-model="user.course"
                                outlined
                                dense
                                style="width: 50%"
                                :rules="rules"
                            ></v-text-field>

                            <v-text-field
                                label="Department"
                                v-model="user.department"
                                outlined
                                dense
                                style="width: 50%"
                                :rules="rules"
                            ></v-text-field>

                            <v-btn
                                @click="Register()"
                                color="primary"
                                tile
                                elevation="0"
                                style="width: 50%"
                                >Register</v-btn
                            >
                        </v-form>
                    </v-card>
                </div>
            </div>
        </v-container>
        <FooterPage />
    </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import ImageDisplay from "./../components/ImageDisplay.vue";
import MiniTitle from "./../components/MiniTitle.vue";
import FooterPage from "./FooterPage.vue";
import axios from "axios";
export default {
    components: {
        ImageDisplay,
        MiniTitle,
        FooterPage,
    },

    data: () => ({
        e6: 1,
        login: true,

        username: null,
        password: null,

        icon: "success",
        title: "",
        text: "",

        user: {},

        rules: [
            (value) => {
                if (value) return true;

                return "";
            },
        ],
        overlay: false,
    }),

    methods: {
        ...mapActions(["storeUser"]),

        displayLogin() {
            this.login = true;
        },

        displayRegister() {
            this.login = false;
        },

        Login() {
            axios({
                method: "post",
                url: "/api/getAccounts",
                data: {
                    username: this.username,
                    password: this.password,
                },
            }).then((res) => {
                if (res.data.length != 0) {
                    if (res.data[0].status != "Unverified") {
                        const newUser = {
                            id: res.data[0].id,
                            name:
                                res.data[0].first_name +
                                " " +
                                res.data[0].middle_name +
                                " " +
                                res.data[0].last_name +
                                " " +
                                res.data[0].suffix,
                        };
                        this.storeUser(newUser);
                        this.username = null;
                        this.password = null;
                        this.title = "Log In Successful";
                        this.text =
                            "You have successfully logged into the Cagayan State University - Carig Campus Library. For security reason, please Log Out and Exit your web browser when you are done accessing services that require authentication.";
                        this.overlay = true;
                    } else {
                        this.icon = "warning";
                        this.title = "Verify Account";
                        this.text =
                            "Please verify your account in the library. Thank you!";
                        this.overlay = true;
                    }
                } else {
                    this.username = null;
                    this.password = null;
                    this.$swal({
                        icon: "warning",
                        title: "Incorrect Username or Password",
                        showConfirmButton: false,
                        timer: 2500,
                    });
                }
            });
        },

        Logout() {
            this.storeUser(null);
            this.title = "Logout Successfull";
            this.text = "Thank you pare. Humayo kana";
            this.overlay = true;
        },

        Register() {
            if (this.$refs.form.validate()) {
                axios({
                    method: "post",
                    url: "/api/insert_user",
                    data: this.user,
                }).then((res) => {
                    console.log(res.data);

                    this.user = {};
                    this.login = true;

                    this.title = "Account Registered";
                    this.text =
                        "Please visit the library in order to verify your account.";
                    this.overlay = true;
                });
            }
        },
    },

    computed: {
        ...mapState(["allAccounts", "loggedInUser"]),

        checkUserLoggedIn() {
            return this.loggedInUser;
        },
    },

    mounted() {
        // this.getAccounts();
    },

    watch: {
        overlay(val) {
            val &&
                setTimeout(() => {
                    this.overlay = false;
                    this.$swal({
                        icon: this.icon,
                        title: this.title,
                        text: this.text,
                        showConfirmButton: true,
                    });
                }, 3000);
        },
    },
};
</script>

<style scoped></style>
