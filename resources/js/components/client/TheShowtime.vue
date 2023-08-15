<template>
    <div class="container mt-5">
        <a-tabs centered >
            <template v-for="(schedule, index) in arrayTransformation(movie.schedules)" :key="index">
                <a-tab-pane :tab="schedule.date" force-render>
                    <div class="row ">
                        <div v-for="(time, index) in schedule.time" :key="index" class="col-2 mt-3">
                            <div class="time-box">
                                <div class="time p-3 text-center bg-default">
                                    <router-link :to="{ name: 'book-ticket', params: { id: schedule.slug, timeId: time.id } }" class="text-white">{{ time.time
                                    }}</router-link>
                                </div>
                                <div class="table mt-2 text-center">131 ghế trống</div>
                            </div>
                        </div>

                    </div>
                </a-tab-pane>
            </template>
        </a-tabs>
    </div>
</template>

<script> 
export default {
    props: {
        movie: Object
    },
    setup(props) {
        const movie = props.movie

        const arrayTransformation = (arr) => {
            const schedules = []
            arr.forEach(item => {
                let existingItem = schedules.find(resultItem => resultItem.date === item.date);
                if (existingItem) {
                    existingItem.time.push({time: item.time, id: item.id});
                } else {
                    schedules.push({ date: item.date, time: [{time: item.time, id: item.id}] });
                }
            });
            return schedules;
        }

        return {
            movie,
            arrayTransformation
        }
    },


}
</script>

<style></style>