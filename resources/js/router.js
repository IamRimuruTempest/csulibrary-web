import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Home from "./pages/HomePage";
import Hello from "./pages/Hello";

import Books from "./pages/BookPage";
import Events from "./pages/EventPage";
import Librarycard from "./pages/LibrarycardPage";
import Career from "./pages/CareerPage";
import Account from "./pages/AccountPage";

// Home Components
import Personnel from "./pages/Home/PersonnelPage.vue";
import History from "./pages/Home/HistoryPage.vue";
import Vgmo from "./pages/Home/VmgoPage.vue";
import Policies from "./pages/Home/PoliciesPage.vue";

// Service Components
import ReferenceServices from "./pages/Services/ReferencePage.vue";
import Circulation from "./pages/Services/CirculationPage.vue";
import LibraryInstructionServices from "./pages/Services/LibraryInstructionPage.vue";
import CurrentAwarenessServices from "./pages/Services/CurrentAwarenessPage.vue";
import InternetServices from "./pages/Services/InternetPage.vue";
import ReferralServices from "./pages/Services/ReferralPage.vue";
import OnlineServices from "./pages/Services/OnlinePage.vue";

// Section Components
import SerialsPage from "./pages/Sections/SerialsPage.vue";
import FictionPage from "./pages/Sections/FictionPage.vue";
import ElectronicPage from "./pages/Sections/ElectronicPage.vue";
import AcquisitionPage from "./pages/Sections/AcquisitionPage.vue";
import FilipinianaPage from "./pages/Sections/FilipinianaPage.vue";
import GeneralCollectionPage from "./pages/Sections/GeneralCollectionPage.vue";
import ArchivePage from "./pages/Sections/ArchivePage.vue";
import MedicinePage from "./pages/Sections/MedicinePage.vue";
import VeterinaryPage from "./pages/Sections/VeterinaryPage.vue";
import AcademicResearchPage from "./pages/Sections/AcademicResearchPage.vue";

import BookInformation from "./components/BookInformation";
import EventInformation from "./components/EventInformation";

import Reservation from "./pages/Reservation.vue";
export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home-blank",
            component: Home,
        },
        {
            path: "/home",
            name: "home",
            component: Home,
        },
        {
            path: "/hello",
            name: "hello",
            component: Hello,
        },

        {
            path: "/books",
            name: "books",
            component: Books,
        },
        {
            path: "/events",
            name: "events",
            component: Events,
        },
        {
            path: "/library-card",
            name: "library-card",
            component: Librarycard,
        },
        {
            path: "/career",
            name: "career",
            component: Career,
        },
        {
            path: "/account",
            name: "account",
            component: Account,
        },

        //Home routes
        {
            path: "/history",
            name: "history",
            component: History,
        },
        {
            path: "/vmgo",
            name: "vmgo",
            component: Vgmo,
        },
        {
            path: "/library-personnel",
            name: "library-personnel",
            component: Personnel,
        },
        {
            path: "/policies-and-guidlines",
            name: "policies-and-guidlines",
            component: Policies,
        },

        //Services router
        {
            path: "/reference-services",
            name: "reference-services",
            component: ReferenceServices,
        },
        {
            path: "/circulation",
            name: "circulation",
            component: Circulation,
        },
        {
            path: "/library-instruction-services",
            name: "library-instruction-services",
            component: LibraryInstructionServices,
        },

        {
            path: "/current-awareness-services",
            name: "current-awareness-services",
            component: CurrentAwarenessServices,
        },
        {
            path: "/internet-services",
            name: "internet-services",
            component: InternetServices,
        },
        {
            path: "/referral-services",
            name: "referral-services",
            component: ReferralServices,
        },
        {
            path: "/online-services",
            name: "online-services",
            component: OnlineServices,
        },

        //Section routes
        {
            path: "/serials-section",
            name: "serials-section",
            component: SerialsPage,
        },
        {
            path: "/fiction-section",
            name: "fiction-section",
            component: FictionPage,
        },
        {
            path: "/electronic-resource-area-section",
            name: "electronic-resource-area-section",
            component: ElectronicPage,
        },
        {
            path: "/new-acquisition-section",
            name: "new-acquisition-section",
            component: AcquisitionPage,
        },
        {
            path: "/filipiniana-section",
            name: "filipiniana-section",
            component: FilipinianaPage,
        },
        {
            path: "/general-collection-section",
            name: "general-collection-section",
            component: GeneralCollectionPage,
        },
        {
            path: "/archive-section",
            name: "archive-section",
            component: ArchivePage,
        },
        {
            path: "/medicine-section",
            name: "medicine-section",
            component: MedicinePage,
        },
        {
            path: "/veterinary-medicine-section",
            name: "veterinary-medicine-section",
            component: VeterinaryPage,
        },

        {
            path: "/academic-research-section",
            name: "academic-research-section",
            component: AcademicResearchPage,
        },

        {
            path: "/reservation",
            name: "reservation",
            component: Reservation,
        },

        {
            path: "/book-information/:id",
            name: "book-information/:id",
            component: BookInformation,
        },

        {
            path: "/event-information/:id",
            name: "event-information/:id",
            component: EventInformation,
        },

        {
            path: "/featured-events/:id",
            name: "featured-events/:id",
            component: EventInformation,
        },
    ],
});
