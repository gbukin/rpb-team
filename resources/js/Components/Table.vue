<script>
import axios from "axios";
import {router} from "@inertiajs/vue3";

export default {
    data() {
        return {
            searchText: '',
            searchText2: '',
            tableColumns: [],
            tableRows: [],
            tableRowsId: []
        }
    },
    methods: {
        updateTable() {
            axios
                .get(this.$props.url)
                .then(response => {
                    this.tableColumns = response.data.columns;
                    this.tableRows = response.data.rows;

                    for (let index in this.tableRows) {
                         this.tableRowsId[index] = this.tableRows[index].id;
                         delete this.tableRows[index].id;
                    }
                })
        },
        moveToElement(id) {
            return router.visit(route(this.$props.elementUrl, {id: id}));
        }
    },
    mounted() {
        this.updateTable()
    }
}
</script>

<script setup>
defineProps({
    url: {
        type: String,
        required: true
    },
    elementUrl: {
        type: String,
        required: true
    }
});
</script>

<template>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" url="{{$page.props.url}}">
        <thead class="text-xs text-card-gray uppercase bg-card">
        <tr>
            <th scope="col"
                class="px-6 py-3 bg-nav"
                v-for="column in tableColumns">
                {{ column }}
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-card border-b border-card-border hover:bg-gray-200 hover:cursor-pointer"
            v-for="(row, index) in tableRows">
            <th scope="row"
                class="px-6 py-4 font-medium text-primary whitespace-nowrap"
                v-on:click="moveToElement(tableRowsId[index])"
                v-for="(cell) in row">
                {{ cell }}
            </th>
        </tr>
        </tbody>
    </table>
</template>

<style scoped>

</style>
