<template>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Offices</th>
            <th>Tables</th>
            <th>SQM</th>
        </tr>
        <tr v-for="location in props.locations" :key="location.id">
            <td>{{ location.name }}</td>
            <td>{{ location.price }}</td>
            <td>{{ location.offices }}</td>
            <td>{{ location.tables }}</td>
            <td>{{ location.sqm }}</td>
        </tr>
    </table>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
import type { Location } from "@/types/types";

const props = defineProps<{
    locations: Location[];
}>();
</script>

<style scoped>
table {
    @apply border-collapse table-auto w-full rounded-md shadow-md bg-white;
}
th {
    @apply border-b font-medium p-4 bg-slate-100 text-slate-700 text-left;
}

td {
    @apply border-b border-slate-100 p-4 text-slate-700;
}
</style>
