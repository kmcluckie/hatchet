<template>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Offices</th>
            <th>Tables</th>
            <th>SQM</th>
        </tr>
        <tr v-for="location in locations" :key="location.id">
            <td>{{ location.id }}</td>
            <td>{{ location.name }}</td>
            <td>{{ location.price }}</td>
            <td>{{ location.offices }}</td>
            <td>{{ location.tables }}</td>
            <td>{{ location.sqm }}</td>
        </tr>
    </table>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

type Location = {
    id: number;
    name: string;
    price: number;
    offices: number;
    tables: number;
    sqm: number;
};

const locations = ref<Location[]>([]);

onMounted(async () => {
    const response = await fetch("/locations");
    locations.value = await response.json();
});
</script>
