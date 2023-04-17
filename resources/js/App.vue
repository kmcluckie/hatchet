<template>
    <div class="max-w-2xl mx-auto p-4">
        <form @submit="submit" class="mb-4">
            <div class="grid grid-cols-3 gap-2">
                <input
                    type="text"
                    class="col-span-3"
                    v-model="filters.name"
                    placeholder="Name"
                />
                <input
                    type="number"
                    v-model="filters.offices"
                    placeholder="Offices"
                />
                <input
                    type="number"
                    v-model="filters.tables"
                    placeholder="Tables"
                />
                <input
                    type="number"
                    v-model="filters.price_gte"
                    placeholder="Min Price"
                />
                <input
                    type="number"
                    v-model="filters.price_lte"
                    placeholder="Max Price"
                />
                <input
                    type="number"
                    v-model="filters.sqm_gte"
                    placeholder="Min Area"
                />
                <input
                    type="number"
                    v-model="filters.sqm_lte"
                    placeholder="Max Area"
                />
            </div>
            <div class="flex justify-end">
                <button
                    type="button"
                    @click="clear"
                    class="bg-slate-50 border border-slate-300 text-slate-600 px-3 py-2 cursor-pointer my-2 mr-2 text-sm"
                >
                    Clear
                </button>
                <input
                    type="submit"
                    value="Submit"
                    class="bg-slate-800 text-white px-3 py-2 cursor-pointer my-2 text-sm"
                />
            </div>
        </form>
        <div v-if="locations.length == 0" class="text-amber-600 rounded-md">
            No results found.
        </div>
        <LocationList v-else :locations="locations"></LocationList>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import LocationList from "@/components/location-list.vue";
import type { Location } from "@/types/types";

const locations = ref<Location[]>([]);
const filters = ref({
    name: null,
    offices: null,
    tables: null,
    price_gte: null,
    price_lte: null,
    sqm_gte: null,
    sqm_lte: null,
});

onMounted(async () => {
    getLocations();
});

const getLocations = async () => {
    const response = await fetch(
        "/locations?" +
            new URLSearchParams(
                Object.entries(filters.value).filter(
                    ([key, value]) => value !== "" && value !== null
                )
            )
    );
    locations.value = await response.json();
};

const submit = (event: Event) => {
    event.preventDefault();
    getLocations();
};

const clear = () => {
    filters.value = {
        name: null,
        offices: null,
        tables: null,
        price_gte: null,
        price_lte: null,
        sqm_gte: null,
        sqm_lte: null,
    };
    getLocations();
};
</script>

<style scoped>
input,
button {
    @apply rounded-md shadow-sm border-slate-300;
}
</style>
