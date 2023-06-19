<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Filipiniana Section" class="mb-15" />
                <NoAvailableInfo />
            </v-card>
        </v-container>
        <FooterPage />
    </div>
</template>

<script>
import ImageDisplay from "../../components/ImageDisplay.vue";
import MiniTitle from "../../components/MiniTitle.vue";
import NoAvailableInfo from "../../components/NoAvailableInfo.vue";
import FooterPage from "../FooterPage.vue";
export default {
    components: {
        ImageDisplay,
        MiniTitle,
        FooterPage,
        NoAvailableInfo,
    },
    data: () => ({}),
};
</script>

<style lang="scss" scoped></style>
