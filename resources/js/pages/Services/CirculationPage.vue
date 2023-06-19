<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Circulation" class="mb-15" />
                <div v-for="(item, index) in circulation" :key="index">
                    <h2 class="text-uppercase text">
                        {{ item.title }}
                    </h2>
                    <p>
                        {{ item.subtitle }}
                    </p>

                    <ol type="1" class="mt-5">
                        <li
                            v-for="(content, index) in item.content"
                            :key="index"
                        >
                            <p>
                                {{ content }}
                            </p>
                        </li>
                    </ol>
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
        circulation: [
            {
                title: "Checking in materials",
                subtitle:
                    "All the materials borrowed or returned from the library collection must be entered on the KOHA Circulation System",
                content: [
                    "The circulation staff will scan your borrower's card and items to checked in.",
                    "Get your borrower's card.",
                ],
            },
            {
                title: "Checking out materials",
                subtitle:
                    "All the materials borrowed or returned from the library collection must be entered on the KOHA Circulation System. The following are the procedures on how to check out the materials:",
                content: [
                    "The circulation staff will scan your borrower's card and items to be checked out.",
                    "Leave the borrower's card.",
                    "Get the items with a receipt.",
                ],
            },
        ],
    }),
};
</script>

<style lang="scss" scoped></style>
