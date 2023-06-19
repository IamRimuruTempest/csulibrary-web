<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Policies and Guidelines" />

                <h1 class="text-uppercase text mt-15">USER GUIDELINES</h1>
                <ul
                    class="mt-5"
                    v-for="(item, index) in guidelines"
                    :key="index"
                >
                    <li>
                        <p>
                            {{ item }}
                        </p>
                    </li>
                </ul>
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
        guidelines: [
            "Silent must be observed at all times. Cellular phones must be in a silent mode while in the library premises.",
            "The library adopts the 'NO BORROWER'S CARD, NO ID CARD, NOENTRY' policy",
            " Only pens and sheets of paper are allowed inside thelibrary. All bags, cases, folders etc. must be left in thebaggage area.",
            "Eating, smoking, sleeping and other unnecessary act like writing on the walls and tables are prohibited in the library.",
            "Inappropriately dressed patrons that may cause disturbance are not allowed in the library.",
            "All library users must cooperate in keeping the library clean and orderly.",
            "Students and other users of the library should put back their chairs (lifting them up not dragging) before they leave their place in the area.",
        ],
    }),
};
</script>

<style lang="scss" scoped></style>
