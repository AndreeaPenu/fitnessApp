<script>
    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,
        props: ['s','eid'],
        data () {
            return {
                firstDate: this.getStartDate(this.s),
                lastDate: '',
                labels: [],
                data: [],
                currentVolume: 0,
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
                labels: this.labels,
                datasets: [
                {
                    label: 'Total volume: ',
                    borderColor: '#4A368B',
                    pointBackgroundColor: 'white',
                    borderWidth: 1,
                    pointBorderColor: '#4A368B',
                    backgroundColor: 'transparent',
                    data: this.data
                }
                ]
            }, this.options)
        },
        methods: {
             addToArray(){    
      

                for(var i = 0; i < this.s.length; i++){
                    if(this.eid == this.s[i].exercise_id){
                        
                        this.lastDate = (this.s[this.s.length - 1].created_at);
                        var currentDate = new Date();
                        var moment = require('moment');
                        var firstDate = moment(this.firstDate).format("MMM Do YY");
                        var lastDate = moment(this.lastDate).format("MMM Do YY");
                        var firstDateDay = moment(this.firstDate).get('date');
                        var firstDateDay1 = moment(this.firstDate).add(1, 'days');
                        var nextDay = moment(firstDateDay1).format("MMM Do YY");  
                       
                 

                        if(this.s[i+1]){
                        if(this.s[i+1].created_at == this.firstDate){
                            this.currentVolume += this.calculateVolume(this.s[i]);
                        }
                     
                            if(this.s[i+1].created_at != this.firstDate) {
                                this.data.push(this.currentVolume);
                                this.labels.push(firstDate);
                                console.log("Volume:" + this.currentVolume + " voor dag " + this.firstDate);
                                this.currentVolume = 0;
                                
                               this.firstDate = this.s[i+1].created_at;
                             //   console.log(this.firstDate);
                               
                            }
                        }
                       
                    }
               }
            },
            getStartDate($sets){
                for(var i=0; i< $sets.length; i++){
                    
                    if(this.eid==this.s[i].exercise_id){
                        return $sets[i].created_at;
                    }
                }
            },
            calculateVolume($set){
                return $set.weight * $set.reps;
            }

        },
        beforeMount(){
            this.addToArray()
        },
    }

</script>