const admin = [
    {
        path: '/admin',
        component: () => import('../layouts/admin.vue'),
        children: [
            {
                path: '',
                name: 'admin-home',
                component: () => import('../pages/admin/home/index.vue'),
            }, 
            {
                path: 'users',
                name: 'admin-users',
                component: () => import('../pages/admin/users/listUser.vue'),
            }, 
            {
                path: 'users/create',
                name: 'admin-users-create',
                component: () => import('../pages/admin/users/create.vue'),
            }, 
            {
                path: 'users/:id/edit',
                name: 'admin-users-edit',
                component: () => import('../pages/admin/users/editUser.vue'),
            }, 
            {
                path: 'account',
                name: 'admin',
                component: () => import('../pages/admin/users/listAdmin.vue'),
            }, 
            {
                path: 'account/create',
                name: 'admin-create',
                component: () => import('../pages/admin/users/createAdmin.vue'),
            },
            {
                path: 'account/:id/edit',
                name: 'admin-edit',
                component: () => import('../pages/admin/users/editAdmin.vue'),
            },
            {
                path: 'login',
                name: 'admin-login',
                component: () => import('../pages/auth/Login.vue'),
            },
            {
                path: 'register',
                name: 'admin-register',
                component: () => import('../pages/auth/Register.vue'),
            },
            {
                path: 'rooms',
                name: 'admin-rooms',
                component: () => import('../pages/admin/rooms/index.vue'),
            },
            {
                path: 'rooms/create',
                name: 'admin-rooms-create',
                component: () => import('../pages/admin/rooms/createRoom.vue'),
            },
        ]
    }
]

export default admin;