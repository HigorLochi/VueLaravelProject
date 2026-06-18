<script setup>
import { ref, onMounted } from 'vue'
import { IconTrash, IconPencil } from '@/components/icons/index.ts'; 
import { useReportStore } from '@/stores/reportStore.ts'

var reports = ref([])
const reportStore = useReportStore()

onMounted(() => {
    reportStore.getAll().then((response) => {
        reports.value = response
    })
})
</script>

<template>
    <table class="default-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Danger Level</th>
                <th>City</th>
                <th>Title</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="report in reports">
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td><IconPencil/></td>
                <td><IconTrash/></td>
            </tr>
        </tbody>
    </table>
</template>