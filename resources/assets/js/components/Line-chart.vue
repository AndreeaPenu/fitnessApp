

<script>

    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,
        props: ['w'],
        data () {
            return {
                weights: [],
                lbls: [],
                options: {
                scales: {
                    yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    gridLines: {
                        display: true
                    }
                    }],
                    xAxes: [ {
                    gridLines: {
                        display: false
                    }
                    }]
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false
                }
            }
        },
        mounted () {
            this.renderChart({
                labels: this.lbls,
                datasets: [
                {
                    label: 'My weight',
                    borderColor: '#4A368B',
                    pointBackgroundColor: 'white',
                    borderWidth: 1,
                    pointBorderColor: '#4A368B',
                    backgroundColor: 'transparent',
                    data: this.weights
                }
                ]
            }, this.options)
        },
        methods: {
             addToArray(){
                var moment = require('moment'); 
                for(var i = 0; i < this.w.length; i++){
                   this.weights.push(this.w[i].weight);
                   this.lbls.push(moment(this.w[i].created_at).format('DD/MM/YYYY'));
               }
            }
        },
        beforeMount(){
            this.addToArray()
        },
    }

</script>