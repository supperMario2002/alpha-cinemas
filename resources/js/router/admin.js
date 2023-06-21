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
                path: 'login',
                name: 'admin-login',
                component: () => import('../pages/auth/Login.vue'),
            }
            ,
            {
                path: 'register',
                name: 'admin-register',
                component: () => import('../pages/auth/Register.vue'),
            }
        ]
    }
]

export default admin;