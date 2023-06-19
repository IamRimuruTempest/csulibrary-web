<template>
    <v-app id="inspire">
        <!-- <v-navigation-drawer v-model="drawer" app>
            <v-list>
                <v-subheader>List of Components</v-subheader>
                <v-list-item v-for="(item, i) in items" :key="i" :to="item.to">
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-content>{{
                            item.text
                        }}</v-list-item-content>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer> -->

        <v-app-bar app flat height="150px" elevation="0">
            <!-- <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon> -->
            <v-container>
                <div class="d-flex align-center">
                    <router-link to="/home">
                        <img
                            src="../../../public/images/logo.png"
                            width="120px"
                            height="100%"
                            class="ma-5"
                            alt=""
                        />
                    </router-link>
                    <!-- <div>
                        <v-toolbar-title
                            >CAGAYAN STATE UNIVERSITY</v-toolbar-title
                        >
                        <span>Carig Campus</span>
                    </div> -->
                    <v-spacer></v-spacer>

                    <div v-for="(item, index) in links" :key="index">
                        <v-list
                            class="d-flex flex-row align-center justify-end"
                            color="#f5f5f5"
                        >
                            <v-menu
                                v-if="
                                    item.text != 'Books' &&
                                    item.text != 'Events' &&
                                    item.text != 'Library Card' &&
                                    item.text != 'Career' &&
                                    item.text != 'Account' &&
                                    item.text != 'Reservation'
                                "
                                offset-y
                                tile
                                content-class="elevation-0"
                                dark
                                :close-on-content-click="true"
                                open-on-hover
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn
                                        elevation="0"
                                        dense
                                        tile
                                        class="button-header my-1"
                                        v-bind="attrs"
                                        v-on="on"
                                    >
                                        {{ item.text }}

                                        <v-icon>mdi-menu-down</v-icon>
                                    </v-btn>
                                </template>
                                <v-list style="border-top: 5px solid #ffcb1a">
                                    <v-list-item
                                        v-for="(child, index) in item.route"
                                        :key="index"
                                        :to="child.to"
                                    >
                                        <a
                                            href=""
                                            class="text-decoration-none white--text"
                                            >{{ child.text }}</a
                                        >
                                    </v-list-item>
                                </v-list>
                            </v-menu>

                            <div v-else-if="item.text == 'Account'">
                                <router-link
                                    :to="item.to"
                                    v-slot="{ navigate }"
                                >
                                    <v-btn
                                        elevation="0"
                                        @click="navigate"
                                        dense
                                        tile
                                        dark
                                        color="#8b0304"
                                        class="my-1 ml-4"
                                    >
                                        {{ item.text }}
                                    </v-btn>
                                </router-link>
                            </div>

                            <div v-else>
                                <router-link
                                    :to="item.to"
                                    v-slot="{ navigate }"
                                >
                                    <v-btn
                                        elevation="0"
                                        @click="navigate"
                                        dense
                                        tile
                                        class="button-header my-1"
                                    >
                                        {{ item.text }}
                                    </v-btn>
                                </router-link>
                            </div>
                        </v-list>
                    </div>
                </div>
            </v-container>
        </v-app-bar>
        <!-- class="ma-2" -->
        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        drawer: null,
        items: [
            { text: "Home", icon: "mdi-home", to: "/home" },
            { text: "Hello", icon: "mdi-home", to: "/hello" },
        ],

        buttons: [
            { text: "Books" },
            { text: "Locations" },
            { text: "Events" },
            { text: "Resources" },
            { text: "About" },
        ],

        links: [
            {
                text: "Home",
                route: [
                    { text: "History", to: "/history" },
                    { text: "VMGO", to: "/vmgo" },
                    { text: "Library Personnel", to: "/library-personnel" },
                    {
                        text: "Policies and Guidelines",
                        to: "/policies-and-guidlines",
                    },
                ],
            },
            { text: "Books", to: "/books" },
            {
                text: "Services",
                route: [
                    { text: "Reference Services", to: "/reference-services" },
                    { text: "Circulation", to: "/circulation" },
                    {
                        text: "Library Instruction Services",
                        to: "/library-instruction-services",
                    },
                    {
                        text: "Current Awareness Services",
                        to: "/current-awareness-services",
                    },
                    { text: "Internet Services", to: "internet-services" },
                    { text: "Referral Services", to: "referral-services" },
                    { text: "Online Services", to: "online-services" },
                ],
            },
            {
                text: "Events",
                to: "/events",
            },
            {
                text: "Sections",
                route: [
                    { text: "Serials Section", to: "/serials-section" },

                    {
                        text: "Fiction Section",
                        to: "/fiction-section",
                    },
                    {
                        text: "Electronic Resource Area",
                        to: "/electronic-resource-area-section",
                    },
                    { text: "New Acquisition", to: "/new-acquisition-section" },
                    { text: "Filipiniana Section", to: "/filipiniana-section" },
                    {
                        text: "General Collection Section",
                        to: "/general-collection-section",
                    },
                    { text: "Archive Section", to: "/archive-section" },
                    { text: "Medicine Section", to: "/medicine-section" },
                    {
                        text: "Veterinary Medicine Section",
                        to: "/veterinary-medicine-section",
                    },
                    {
                        text: "Academic Research Section",
                        to: "/academic-research-section",
                    },
                ],
            },
            // { text: "Library Card", to: "/library-card" },
            { text: "Career", to: "/career" },
            { text: "Reservation", to: "/reservation" },
            { text: "Account", to: "/account" },
        ],

        hover: false,
    }),
};
</script>

<style scoped>
.button-header:hover {
    color: #8b0304 !important;
}

a:hover {
    color: #ffcb1a !important;
}
</style>
