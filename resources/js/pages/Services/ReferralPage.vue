<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Referral Services" class="mb-15" />
                <h1 class="text-uppercase text">Referral Services</h1>
                <p>
                    When there is a need for library material that is not
                    available at the College Library, the researcher is referred
                    to other libraries.
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
