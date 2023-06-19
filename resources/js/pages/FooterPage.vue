<template>
    <div class="mt-15">
        <div
            class="py-8 text-uppercase white--text d-flex align-center justify-center"
            style="background-color: #8b0304"
        >
            <h1 class="mr-5">SUPPORT THE LIBRARY, GIVE TODAY</h1>

            <v-btn icon class="btn-arrow">
                <v-icon size="50" color="white">mdi-arrow-right-thick</v-icon>
            </v-btn>
        </div>
        <v-container>
            <v-row class="my-15">
                <v-col cols="4">
                    <v-card-title
                        class="text-uppercase text-decoration-underline pa-0 font-weight-bold"
                        style="color: #8b0304 !important"
                        >Contacts</v-card-title
                    >
                    <p class="mt-3">Email Us: csucariglibrary@gmai.com</p>
                    <p>Phone Number: (091) 053 5315</p>
                    <p>Location: 2F Library Building, CSU - Carig Campus</p>

                    <div>
                        <a href=""><v-icon>mdi-facebook</v-icon></a>
                        <a href=""><v-icon>mdi-instagram</v-icon></a>
                        <a href=""><v-icon>mdi-twitter</v-icon></a>
                    </div>
                </v-col>

                <v-col cols="2">
                    <v-card-title
                        class="text-uppercase text-decoration-underline pa-0 font-weight-bold"
                        style="color: #8b0304 !important"
                        >LINKS</v-card-title
                    >
                    <ul class="d-flex flex-column pl-0">
                        <a href="" class="text-decoration-none mt-3 black--text"
                            >Books</a
                        >
                        <a href="" class="text-decoration-none black--text"
                            >Donate</a
                        >
                        <a href="" class="text-decoration-none black--text"
                            >Events</a
                        >
                        <a href="" class="text-decoration-none black--text"
                            >About</a
                        >
                        <a href="" class="text-decoration-none black--text"
                            >Careers</a
                        >
                    </ul>
                </v-col>

                <v-col cols="6">
                    <!-- <img
                        src="../../../public/images/csulogo.png"
                        width="100"
                        height="100"
                        class="ma-5"
                        alt=""
                    />
                    <img
                        src="../../../public/images/logo.png"
                        width="100"
                        height="100"
                        class="ma-5"
                        alt=""
                    /> -->
                    <div class="d-flex align-center justify-space-around">
                        <img
                            src="../../../public/images/colleges/cics.jpg"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                        <img
                            src="../../../public/images/colleges/it.jpg"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                        <img
                            src="../../../public/images/colleges/pa.jpg"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                        <img
                            src="../../../public/images/colleges/coe.jpg"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                    </div>
                    <div class="d-flex align-center justify-space-around">
                        <img
                            src="../../../public/images/colleges/chk.png"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                        <img
                            src="../../../public/images/colleges/com.png"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                        <img
                            src="../../../public/images/colleges/cvm.png"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                        <img
                            src="../../../public/images/colleges/cas.png"
                            width="100"
                            height="100"
                            alt=""
                            class="college-image"
                        />
                    </div>
                </v-col>
            </v-row>
            <hr />
        </v-container>

        <div class="py-8 d-flex align-center justify-center flex-column">
            <p class="pa-0 ma-0">Copyright © 2023</p>
            <p class="pa-0 ma-0">
                Cagayan State University - Carig Campus Library
            </p>
            <p class="pa-0 ma-0">All rights reserved.</p>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
a:hover {
    color: #8b0304 !important;
    font-weight: 700;
}
.btn-arrow {
    transition: 0.5s;
}
.btn-arrow:hover {
    margin-left: 20px;
    transition: 0.5s;
}

.college-image {
    filter: grayscale(100%);
    -webkit-filter: grayscale(100%);
    transition: 0.5s;
}
.college-image:hover {
    filter: grayscale(0%);
    -webkit-filter: grayscale(0%);
    transition: 0.5s;
}
</style>
