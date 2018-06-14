<script>
    import { Line } from 'vue-chartjs';
    export default {
        extends: Line,
        props: ['s','eid'],
        data () {
            return {
                firstDate: this.getStartDate(this.s), 
                lastDate: this.getLastDate(this.s),
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
                var currentDate = this.firstDate;
                for(var i = 0; i < this.s.length; i++){
                    if(this.eid == this.s[i].exercise_id){

                        if(this.s[i].created_at.split(' ')[0] == currentDate.split(' ')[0]){
                            this.currentVolume += this.calculateVolume(this.s[i]);
                        }                      
                        
                        if(this.s[i+1] != null && this.s[i+1].created_at.split(' ')[0] != currentDate.split(' ')[0]) {
                            this.data.push(this.currentVolume);
                            this.labels.push(currentDate.split(' ')[0]);
                            this.currentVolume = 0;
                            currentDate = this.s[i+1].created_at.split(' ')[0];
                        } 
             
                        if(this.s[i].created_at.split(' ')[0] == this.lastDate.split(' ')[0] && this.s[i+1] == null){
                            this.data.push(this.currentVolume);
                            this.labels.push(currentDate.split(' ')[0]);
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
            getLastDate($sets){
                for(var i=0; i< $sets.length; i++){
                    if(this.eid==this.s[i].exercise_id){
                        return $sets[$sets.length-1].created_at;
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