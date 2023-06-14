import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
      {
        path: '/',
        component: () => import('../layouts/client.vue'),
        children: [
          {
            path: '',
            name: 'home',
            component: () => import('../pages/client/HomePage.vue')
          },
          {
            path: '',
            name: 'movies',
            component: () => import('../pages/client/MoviePage.vue')
          }
        ]
      },
    ]
});

export default router;