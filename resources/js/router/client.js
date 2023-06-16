const client = [
    {
        path: '/admin',
        component: () => import('../layouts/admin.vue'),
        children: [
            {
                path: '',
                name: 'admin-home',
                component: () => import('../page/admin/home/index.vue'),
            }
        ]
    }
]

export default client;