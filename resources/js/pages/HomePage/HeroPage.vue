<template>
    <div
        style="
            background: url('../images/csucarig1.jpg');
            height: 680px;
            width: 100wh;
            background-repeat: no-repeat;
            background-size: cover;
        "
    >
        <div class="card-overlay" style="border-bottom: 5px solid #8b0304">
            <v-container
                class="d-flex align-start flex-column justify-center"
                style="height: 100%"
            >
                <h1
                    class="text-h2 font-weight-black white--text text-uppercase"
                >
                    Explore the world <br />
                    of books
                </h1>
                <p class="text-subtitle-1 white--text">
                    CAGAYAN STATE UNIVERSITY - CARIG CAMPUS LIBRARY
                </p>

                <v-btn
                    size="x-large"
                    color="red"
                    tile
                    elevation="0"
                    class="white--text"
                    large
                >
                    See more
                </v-btn>
            </v-container>
        </div>
    </div>
</template>

<script></script>

<style scoped>
.card-overlay {
    background: rgba(0, 0, 0, 0.5);
    height: inherit;
}
</style>
