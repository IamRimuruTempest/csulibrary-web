<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Current Awareness Services" class="mb-15" />
                <div v-for="(item, index) in awareness" :key="index">
                    <h2 class="text-uppercase text">
                        {{ item.title }}
                    </h2>
                    <p>
                        {{ item.subtitle }}
                    </p>
                </div>
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
    data: () => ({
        awareness: [
            {
                title: "Cas",
                subtitle:
                    "INFORMATION BOARD Posting necessary information on the bulletin board regarding the trnds, news and updates about the Library, School & the Community",
            },
            {
                title: "FB & POST",
                subtitle:
                    "Updates Clients through FB page posting about the Students who can now claim their Library cards, Special events like monthly Library activities and otherlibrary achievements & award",
            },
        ],
    }),
};
</script>

<style lang="scss" scoped></style>
