<script setup>
import { ref } from "vue";
import "@fullcalendar/core/vdom";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";

const options = ref({
    plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
    initialDate: "2017-02-01",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    editable: true,
    selectable: true,
    selectMirror: true,
    dayMaxEvents: true,
});
const events = ref(null);
</script>

<template>
    <div>
        <!--            <FullCalendar :events="events" :options="options" />-->
    </div>
</template>

<style scoped>
@media screen and (max-width: 960px) {
    ::v-deep(.fc-header-toolbar) {
        display: flex;
        flex-wrap: wrap;
    }
}
</style>
