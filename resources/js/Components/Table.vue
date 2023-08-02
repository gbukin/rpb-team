<script>
import axios from "axios";
import {router} from "@inertiajs/vue3";

export default {
    data() {
        return {
            tableColumns: [],
            tableRows: [],
            tableRowsId: [],
            searchString: '',
            timeout: null,
        }
    },
    methods: {
        updateTable() {
            axios
                .get(this.$props.url, {params: {search: this.searchString}})
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
        },
        search: function() {
            clearTimeout(this.timeout);
            let self = this;
            this.timeout = setTimeout(function () {
                self.updateTable();
            }, 200);

        }
    },
    mounted() {
        this.updateTable()
    }
}
</script>

<script setup>
import SearchTextInput from "@/Components/SearchTextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

defineProps({
    url: {
        type: String,
        required: true
    },
    elementUrl: {
        type: String,
        required: true
    },
    withSearch: {
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <section class="mb-4 p-3" v-if="withSearch">
        <InputLabel value="Поиск"/>
        <SearchTextInput v-model="searchString" @keyup="search"/>
    </section>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" url="{{$page.props.url}}"
           element-url="{{$page.props.elementUrl}}">
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
        <tr class="bg-card border-b border-card-border hover:bg-button-gray hover:cursor-pointer"
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
