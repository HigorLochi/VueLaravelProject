<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useInsightStore } from '@/stores/insightStore.ts'

const insightStore = useInsightStore()
const documentStyle = getComputedStyle(document.documentElement);

const chartOptions = {
  plugins: {
    legend: {
      labels: {
        color: documentStyle.getPropertyValue('--vt-c-white')
      }
    },
    title: {
      display: true,
      text: 'Reports by Month',
      font: {
        size: 25,
        weight: 'bold'
      },
      color: documentStyle.getPropertyValue('--vt-c-primevue-green')
    }
  },
  scales: {
    x: {
      ticks: {
        color: documentStyle.getPropertyValue('--vt-c-white')
      },
      grid: {
        color: documentStyle.getPropertyValue('--vt-c-primevue-black-strong')
      }
    },
    y: {
      ticks: {
        color: documentStyle.getPropertyValue('--vt-c-white')
      },
      grid: {
        color: documentStyle.getPropertyValue('--vt-c-primevue-black-strong')
      }
    }
  }
}

var reportCountByMonth = ref({})

onMounted(() => {
  insightStore.reportCountByMonth().then((response) => {
    reportCountByMonth.value = {
      labels: Object.keys(response),
      datasets: [
        {
          label: 'Reports',
          data: Object.values(response)
        }
      ]
    }
  })
})
</script>

<template>
  <main class="page-container">
    <Chart type="bar" :data="reportCountByMonth" :options="chartOptions" class="chart"></Chart>
  </main>
</template>
