<template>
    <div id="movie-detail" class="container" >
        <div class="container-fluid">
            <h1 class="h1 text-center" id="pageHeaderTitle">Chi tiết phim</h1>
            <article class="postcard">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="img_movie p-2">
                            <img
                                v-bind:src="movie.img"
                                alt="movie poster"
                                class="rounded-3 mx-auto d-block"
                                style="width: 80%;"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="descr_movie p-2">
                            <h2 class="h2">{{ movie.name }}</h2>
                            <p class="" style="text-align: justify">
                                {{ movie.descrition }}
                            </p>
                            <div class="row mt-3">
                                <div class="col-3"><h6>Đạo Diễn :</h6></div>
                                <div class="col-9">{{ movie.director }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3"><h6>Thời gian :</h6></div>
                                <div class="col-9">{{ movie.running_time }}&nbsp;Phút</div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="container mt-5">
        <nav>
            <div
                class="nav nav-tabs d-flex justify-content-center"
                id="nav-tab"
                role="tablist"
            >
                <button
                    class="nav-link active"
                    id="nav-home-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-day-1"
                    type="button"
                    role="tab"
                    aria-controls="nav-day-1"
                    aria-selected="true"
                >
                    <h3 class="text-primary">15/02 - T5</h3>
                </button>
                <button
                    class="nav-link"
                    id="nav-profile-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-day-2"
                    type="button"
                    role="tab"
                    aria-controls="nav-day-2"
                    aria-selected="false"
                >
                    <h3 class="text-primary">15/08 - T4</h3>
                </button>
                <button
                    class="nav-link"
                    id="nav-profile-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-day-3"
                    type="button"
                    role="tab"
                    aria-controls="nav-day-3"
                    aria-selected="false"
                >
                    <h3 class="text-primary">15/08 - T4</h3>
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div
                class="tab-pane fade show active"
                id="nav-day-1"
                role="tabpanel"
                aria-labelledby="nav-home-tab"
            >
                <div class="row align-items-center justify-content-center">
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2">131 ghế trống</div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="nav-day-2"
                role="tabpanel"
                aria-labelledby="nav-profile-tab"
            >
                <div class="row align-items-center justify-content-center">
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="nav-day-3"
                role="tabpanel"
                aria-labelledby="nav-123-tab"
            >
                <div class="row align-items-center justify-content-center">
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="time-box">
                            <div
                                class="time p-3 text-center bg-primary text-white"
                            >
                                16:35
                            </div>
                            <div class="table mt-2 text-center">
                                131 ghế trống
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</template>

<script> 
import { useRoute } from 'vue-router';
import dayjs from 'dayjs';
import { reactive } from "vue";
export default { 
    setup() {
        const router = useRoute();

        const movie = reactive({
            name: '',
            slug: '',
            img: '',
            descrition: '',
            release_date: '',
            categories: [],
            director: '',
            running_time: '',
        });

        const getMovie = async () => {
            axios.get(`/api/client/movie/${router.params.id}/show`)
                .then((response) => {
                    console.log(response);
                    movie.name = response.data.name;
                    movie.slug = response.data.slug;
                    movie.descrition = response.data.descrition;
                    movie.release_date = dayjs(response.data.release_date);
                    movie.director = response.data.director;
                    movie.img = response.data.img;
                    movie.running_time = response.data.running_time;
                    response.data.categories.forEach(item => {
                        movie.categories.push({
                            label: item.name,
                            value: item.id,
                        });
                    });
                    console.log(movie);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
        getMovie();

        return {
            movie
        }
    },
    mounted() {
        window.scrollTo(0, 0);
    },
};
</script>
