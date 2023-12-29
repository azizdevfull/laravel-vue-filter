<!-- RegionSelector.vue -->

<template>
    <div>
        <label for="region">Select Region:</label>
        <select v-model="selectedRegion" @change="fetchDistricts">
            <option
                v-for="region in regions"
                :key="region.id"
                :value="region.id"
            >
                {{ region.name }}
            </option>
        </select>

        <div v-if="selectedRegion">
            <label for="district">Select District:</label>
            <select v-model="selectedDistrict" @change="fetchProducts">
                <option
                    v-for="district in districts"
                    :key="district.id"
                    :value="district.id"
                >
                    {{ district.name }}
                </option>
            </select>
        </div>

        <div v-if="selectedDistrict">
            <h2>Products in {{ selectedDistrictName }}</h2>
            <ul>
                <li v-for="product in products" :key="product.id">
                    {{ product.title }}
                </li>
            </ul>
            <div v-if="pagination">
                <button
                    @click="loadPage(pagination.prevPageUrl)"
                    :disabled="!pagination.prevPageUrl"
                >
                    Prev
                </button>
                <button
                    @click="loadPage(pagination.nextPageUrl)"
                    :disabled="!pagination.nextPageUrl"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            selectedRegion: null,
            selectedDistrict: null,
            selectedDistrictName: null,
            regions: [],
            districts: [],
            products: [],
            pagination: null,
        };
    },
    mounted() {
        this.fetchRegions();
    },
    methods: {
        fetchRegions() {
            axios
                .get("http://localhost:8000/api/regions")
                .then((response) => {
                    this.regions = response.data.data;
                })
                .catch((error) => {
                    console.error("Error fetching regions", error);
                });
        },
        fetchDistricts() {
            if (this.selectedRegion) {
                axios
                    .get(
                        `http://localhost:8000/api/regions/${this.selectedRegion}/districts`
                    )
                    .then((response) => {
                        this.districts = response.data.data;
                    })
                    .catch((error) => {
                        console.error("Error fetching districts", error);
                    });
            }
        },
        fetchProducts() {
            if (this.selectedDistrict) {
                axios
                    .get(
                        `http://localhost:8000/api/districts/${this.selectedDistrict}/products`
                    )
                    .then((response) => {
                        this.products = response.data.data.item;
                        this.pagination = response.data.data._meta;
                        this.selectedDistrictName = this.districts.find(
                            (d) => d.id === this.selectedDistrict
                        ).name;
                    })
                    .catch((error) => {
                        console.error("Error fetching products", error);
                    });
            }
        },
        loadPage(url) {
            if (url) {
                axios
                    .get(url)
                    .then((response) => {
                        this.products = response.data.data.item;
                        this.pagination = response.data.data._meta;
                    })
                    .catch((error) => {
                        console.error("Error fetching products", error);
                    });
            }
        },
    },
};
</script>
