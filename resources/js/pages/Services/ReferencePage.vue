<template>
    <div>
        <v-container>
            <ImageDisplay />
            <v-card tile color="transparent" elevation="0" class="mt-16">
                <MiniTitle title="Policies and Guidelines" />

                <h1 class="text-uppercase text mt-15">Reference Services</h1>
                <p>
                    The reference desk of the library provies courteous, prompt
                    and user-oriented services to every library user.
                </p>

                <ul
                    class="mt-5"
                    v-for="(item, index) in reference"
                    :key="index"
                >
                    <li>
                        <h4 class="text-uppercase">Reference Assistance</h4>
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
        reference: [
            "In person the reference staff member use materials in the library collection and online to assis the library user in satisfying his/her information needs. Users are assisted in all the areas of the library and are approached to determine if they need reference assistances.",
            "In telepone request that would require extensive searching or an excessive amount of time to fulfill are handled with the suggestion that requester come to the library in person to pursue the information.",
            "In e-mail, each librarian on reference duty will be responsible for checking the reference e-mail. When an e-mail is received, the librarian who receives it will be responsible for replying to the patron.",
        ],
    }),
};
</script>

<style lang="scss" scoped></style>
