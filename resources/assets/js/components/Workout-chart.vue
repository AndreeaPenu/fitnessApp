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
                var moment = require('moment');  
                var currentDate = this.firstDate;
                for(var i = 0; i < this.s.length; i++){
                    if(this.eid == this.s[i].exercise_id){
                       this.currentVolume = this.calculateVolume(this.s[i]);
                       this.data.push(this.currentVolume); 
                       this.labels.push(moment(this.s[i].created_at).format('DD/MM/YYYY'));  
                       currentDate=this.s[i].created_at.split(' ')[0];
                    }
               }

               var map = {};

                for (var i = 0; i < this.labels.length; i++) {
                    var element = this.labels[i];
                    if (!map[element]) {
                        map[element] = [i];
                    }
                    else {
                        map[element].push(i);
                    }
                }

                var newData = [];
                var newLabels = [];
                var volume = 0;
                for (var i = 0; i < Object.keys(map).length; i++) {
                    volume = 0;
                    for (var j = 0; j < Object.values(map)[i].length; j++) {
                        volume += this.data[Object.values(map)[i][j]];
                    }
                    newData.push(volume);
                }


                function onlyUnique(value, index, self) { 
                    return self.indexOf(value) === index;
                }
                    this.labels = this.labels.filter(onlyUnique);
                    this.data = newData;
            
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