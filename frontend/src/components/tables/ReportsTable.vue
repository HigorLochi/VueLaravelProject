<script setup>
import { BaseTitle } from '../titles/index.ts';
import { BaseButton } from '../buttons/index.ts';
import { IconTrash, IconPencil } from '../icons/index.ts'; 
</script>

<template>
    <BaseTitle title="Reports List" />
    <BaseButton text="Add Report" role="confirm" to="/report-form" />
    <table class="default-table">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
                <th>Column 6</th>
                <th>Column 7</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td>Row</td>
                <td><IconPencil/></td>
                <td><IconTrash/></td>
            </tr>
            <tr>
                <td>Row</td>
                <td>Row</td>
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