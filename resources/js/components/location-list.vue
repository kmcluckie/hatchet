<template>
    <div>
        <div v-if="loading">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6 animate-spin text-slate-600"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                />
            </svg>
        </div>
        <div
            v-else-if="locations.length == 0"
            class="text-amber-600 rounded-md"
        >
            No results found.
        </div>
        <table v-else>
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
    </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
import type { Location } from "@/types/types";

const props = defineProps<{
    locations: Location[];
    loading: boolean;
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
