const client = [
    {
        path: "/",
        component: () => import("../layouts/client.vue"),
        children: [
            {
                path: "",
                name: "home",
                component: () => import("../pages/client/HomePage.vue"),
            },
            {
                path: "",
                name: "movies",
                component: () => import("../pages/client/MoviePage.vue"),
            },
            {
                path: "",
                name: "schedule",
                component: () => import("../pages/client/Schedule.vue"),
            },
        ],
    },
    {
        path: "/:id",
        name: "movie-detail",
        component: () => import("../pages/client/Movie-detail.vue"),
    },
    {
        path: "/Login",
        name: "Login",
        component: () => import("../pages/auth/LoginClient.vue"),
    },
    {
        path: "/SignIn",
        name: "SignIn",
        component: () => import("../pages/auth/SignClient.vue"),
    },
];

export default client;
