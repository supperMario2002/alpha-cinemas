<template>
    <div id="movie">
        <div class="container my-5">
            <a-tabs v-model:activeKey="activeKey" centered>
                <a-tab-pane key="1" tab="Phim Sắp Chiếu">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3"
                            v-for="movie in movies" :key="movie.id">
                            <router-link :to="`/${movie.slug}`" class="text-decoration-none">
                                <div class="card" style="width: 18rem">
                                    <img v-bind:src="movie.img" class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ movie.name }}
                                        </h5>
                                        <p class="card-text">
                                            <span class="fw-bold">Thể loại: </span><span
                                                v-for="category in movie.categories" :key="category.id">{{ category.name
                                                }}&nbsp;</span>
                                        </p>
                                        <p class="card-text">
                                            <span class="fw-bold">Thời Lượng: </span>{{ movie.running_time }}&nbsp;Phút
                                        </p>
                                        <a href="#" class="btn btn-primary">Mua vé</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </a-tab-pane>
                <a-tab-pane key="2" tab="Phim Đang Chiếu" force-render>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </a-tab-pane>
                <a-tab-pane key="3" tab="Xuất Đặc biệt">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex justify-content-center mt-3">
                            <router-link :to="`/${123}`">
                                <div class="card" style="width: 18rem">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2021/07/app-chinh-mau-anh-phim-1967vintage-1.jpg"
                                        class="card-img-top" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on
                                            the card title and make up the bulk
                                            of the card's content.
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </a-tab-pane>
            </a-tabs>
        </div>
    </div>
</template>

<script>
import { defineComponent, ref } from "vue";
import axios from 'axios';

export default {
    setup() {

        const movies = ref([]);
        const token = localStorage.getItem('user-token');
        const getmovie = () => axios.get('/api/client/movie/index')
        .then((reponse) => {
                movies.value = reponse.data.listMovie; 
            })
            .catch((error) => {
                console.log(error);
            })
        getmovie();

        return {
            activeKey: ref("1"),
            movies
        };
    },
    props: {
        Pages: { type: String, }
    }
};
</script>

<style></style>
