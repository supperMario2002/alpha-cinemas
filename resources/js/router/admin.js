const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin.vue"),
        children: [
            {
                path: "",
                name: "admin-home",
                component: () => import("../pages/admin/home/index.vue"),
            },
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/listUser.vue"),
            },
            {
                path: "users/create",
                name: "admin-users-create",
                component: () => import("../pages/admin/users/create.vue"),
            },
            {
                path: "users/:id/edit",
                name: "admin-users-edit",
                component: () => import("../pages/admin/users/editUser.vue"),
            },
            {
                path: "account",
                name: "admin",
                component: () => import("../pages/admin/users/listAdmin.vue"),
            },
            {
                path: "account/create",
                name: "admin-create",
                component: () => import("../pages/admin/users/createAdmin.vue"),
            },
            {
                path: "account/:id/edit",
                name: "admin-edit",
                component: () => import("../pages/admin/users/editAdmin.vue"),
            },
            {
                path: "login",
                name: "admin-login",
                component: () => import("../pages/auth/Login.vue"),
            },
            {
                path: "register",
                name: "admin-register",
                component: () => import("../pages/auth/Register.vue"),
            },
            {
                path: "rooms",
                name: "admin-rooms",
                component: () => import("../pages/admin/rooms/index.vue"),
            },
            {
                path: "rooms/create",
                name: "admin-rooms-create",
                component: () => import("../pages/admin/rooms/create.vue"),
            },
            {
                path: 'rooms/:id/edit',
                name: 'admin-rooms-edit',
                component: () => import('../pages/admin/rooms/edit.vue'),
            },

            // quản lý danh mục phim
            {
                path: "categories",
                name: "admin-categories",
                component: () => import("../pages/admin/categories/index.vue"),
            },
            {
                path: "categories/create",
                name: "admin-categories-create",
                component: () => import("../pages/admin/categories/create.vue"),
            },
            {
                path: 'categories/:id/edit',
                name: 'admin-categories-edit',
                component: () => import('../pages/admin/categories/edit.vue'),
            },

            // quản lý phim
            {
                path: "movies",
                name: "admin-movies",
                component: () => import("../pages/admin/movies/index.vue"),
            },
            {
                path: "movies/create",
                name: "admin-movies-create",
                component: () => import("../pages/admin/movies/create.vue"),
            },
            {
                path: 'movies/:id/edit',
                name: 'admin-movies-edit',
                component: () => import('../pages/admin/movies/edit.vue'),
            },
            
        ]
    }
]

export default admin;
