

<script>

    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,
        props: ['s','eid'],
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
                    label: 'Kg lifted: ',
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
                
                for(var i = 0; i < this.s.length; i++){
                 if( this.eid == this.s[i].exercise_id){
                        this.weights.push(this.s[i].weight);
                        this.lbls.push(this.s[i].created_at);
                    }
                  
               }
            }
        },
        beforeMount(){
            this.addToArray()
        },
    }

</script>