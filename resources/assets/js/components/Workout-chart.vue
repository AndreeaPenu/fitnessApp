

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
                var moment = require('moment');
                var created_at = moment($created).format("MMM Do YY");
                var firstDate = moment(this.firstDate).format("MMM Do YY");
                var lastDate = moment(this.lastDate).format("MMM Do YY");

                var firstDateDay = moment(this.firstDate).get('date');
                var lastDateDay = moment(this.lastDate).get('date');
                
                var firstDateDay1 = moment(this.firstDate).add(1, 'days');

                var nextDay = moment(firstDateDay1).format("MMM Do YY");

                var daysBetween = lastDateDay - firstDateDay - 1;




               // console.log(nextDay);

             

               // var nextDate = moment(this.firstDate).get('date').add(1, 'days'); 

                //console.log(nextDate +' next one');
               
             //console.log(this.firstDate + ' first '  + $created +' created at');

                if(created_at == firstDate){
                        this.volume += ($weight * $reps);
                }
                 
                if(created_at == lastDate){
                        this.volume += ($weight * $reps);
                }

 
                if (daysBetween > 1){
                    for(var i = 0; i < daysBetween.length ; i++){
                        if(created_at == daysBetween){
                            this.volume += ($weight * $reps);
                        }
                    }
                } 
                
         //   console.log(created_at);
            }

        },
        beforeMount(){
            this.addToArray()
        },
    }

</script>