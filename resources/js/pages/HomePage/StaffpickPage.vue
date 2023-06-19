<template>
    <div>
        <v-container>
            <v-card tile color="transparent" elevation="0" class="mt-7">
                <MiniTitle title="Staff Picks" />

                <v-card class="mt-5" elevation="0">
                    <v-row>
                        <v-col class="ma-5 text-left">
                            <v-avatar size="150">
                                <img
                                    src="https://images.summitmedia-digital.com/esquiremagph/images/2019/07/03/Fernando-Po-Sr-MAIN-IMAGE.jpg"
                                    alt="John"
                                    class="image"
                                />
                            </v-avatar>
                            <h3 class="text-uppercase mt-5">Fernando Corpuz</h3>
                            <h1>Auring's Wrath</h1>
                            <p>
                                Carnegie Library of Pittsburgh's annual Best
                                Books for Babies lists encourage parents and
                                other caregivers to read to babies right from
                                the start—because learning begins at birth.
                            </p>
                            <ArrowButton color="#8b0304" />
                        </v-col>

                        <v-col class="ma-5 text-left">
                            <v-avatar size="150">
                                <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQAqYmxnFfY6PMvuvDaJf3S1ogKmwJCUVolQ&usqp=CAU"
                                    alt="John"
                                    class="image"
                                />
                            </v-avatar>
                            <h3 class="text-uppercase mt-5">
                                Vicente Taburico
                            </h3>
                            <h1>The Priory of the Orange Tree</h1>
                            <p>
                                Carnegie Library of Pittsburgh's annual Best
                                Books for Babies lists encourage parents and
                                other caregivers to read to babies right from
                                the start—because learning begins at birth.
                            </p>
                            <ArrowButton color="#8b0304" />
                        </v-col>
                        <v-col class="ma-5 text-left">
                            <v-avatar size="150">
                                <img
                                    src="https://www.laut.de/Prince/prince-157616.jpg"
                                    alt="John"
                                    class="image"
                                />
                            </v-avatar>
                            <h3 class="text-uppercase mt-5">Prince Tuliao</h3>
                            <h1>Curse of Shadows and Thorns</h1>
                            <p>
                                Carnegie Library of Pittsburgh's annual Best
                                Books for Babies lists encourage parents and
                                other caregivers to read to babies right from
                                the start—because learning begins at birth.
                            </p>
                            <ArrowButton color="#8b0304" />
                        </v-col>
                    </v-row>
                </v-card>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import ArrowButton from "../../components/ArrowButton.vue";
import MiniTitle from "../../components/MiniTitle.vue";

export default {
    components: {
        ArrowButton,
        MiniTitle,
    },
};
</script>

<style scoped></style>
