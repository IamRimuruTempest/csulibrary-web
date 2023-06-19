<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Library Instruction Services" class="mb-15" />
                <div v-for="(item, index) in instruction" :key="index">
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
        instruction: [
            {
                title: "General Orientation",
                subtitle:
                    "The CSU Carig Library Conducts orientaion about Library Services and Polocies every beginning of each academic semester.",
            },
            {
                title: "Individual Orientation",
                subtitle:
                    "Instructions inside the library premises (i.e Instruction how to use the online public access Catalog, Do's and Dont's inside the library).",
            },
            {
                title: "Library Tour",
                subtitle:
                    "The CSU Carig library offers both pysical & online library tour.",
            },
            {
                title: "Moseum Tour",
                subtitle:
                    "- Instructions about what to Do and Not to do inside the Moseum Clients may avail this service through schedule. Clients should ask permission and schedule to the librarian Moseum tour.",
            },
        ],
    }),
};
</script>

<style lang="scss" scoped></style>
