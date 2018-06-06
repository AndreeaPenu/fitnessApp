<template>
<div class="app">
  <h1>Vue Line-chart</h1>
  <vue-event-calendar :events="demoEvents"></vue-event-calendar>
  </div>
</template>



<script>

    Vue.component('line-chart', {
    extends: VueChartJs.Line,
    mounted () {
      this.renderChart({
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label: 'Data One',
            backgroundColor: '#f87979',
            data: [40, 39, 10, 40, 39, 80, 40]
          }
        ]
      }, {responsive: true, maintainAspectRatio: false})
    }
    
  })
  
  var vm = new Vue({
    el: '.app',
    data: {
      message: 'Hello World'
    }
  })
</script>

  