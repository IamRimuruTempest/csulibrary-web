<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Internet Services" class="mb-15" />
                <h1 class="text-uppercase text">Internet Services</h1>
                <p>
                    The CSU Carig Library has 20 computer units with internet
                    connection for study, entertainments & Research . Clients
                    can also connect them handheld devices to the internet by
                    asking the WIFI password to the librarian.
                </p>
            </v-card>
        </v-container>
        <FooterPage />
    </div>
</template>

<script>
import ImageDisplay from "../../components/ImageDisplay.vue";
import MiniTitle from "../../components/MiniTitle.vue";
import FooterPage from "../FooterPage.vue";
export default {
    components: {
        ImageDisplay,
        MiniTitle,
        FooterPage,
    },
    data: () => ({}),
};
</script>

<style lang="scss" scoped></style>
