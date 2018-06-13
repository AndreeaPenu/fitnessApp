

<script>

    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,
        props: ['s','eid'],
        data () {
            return {
                weights: [],
                lbls: [],
                firstDate: '',
                lastDate: '',
                volume: 0,
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
                 if(this.eid == this.s[i].exercise_id){
                     
                        this.firstDate = (this.s[0].created_at);
                        this.lastDate = (this.s[this.s.length - 1].created_at);
                        this.calculateVolume(this.s[i].weight, this.s[i].reps,this.s[i].created_at);
                        this.weights.push(this.s[i].weight);
                        this.lbls.push(this.s[i].created_at);
                    }
                  
               }
            },
            calculateVolume($weight, $reps, $created){
             console.log(this.firstDate + ' first '  + $created +' created at');

                if($created == this.firstDate){
                        this.volume += ($weight * $reps);
                }
                 
            }

        },
        beforeMount(){
            this.addToArray()
        },
    }

</script>