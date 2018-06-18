<template>
  <div id="app">
    <vue-event-calendar :events="demoEvents"></vue-event-calendar>
  </div>
</template>

<script>
export default {
  name: 'agenda',
  props: ['workouts'],
  data () {
    return {
      demoEvents: [],
      title: '',
      desc: ''
    }
  },
  methods: {
    addToArray(){
          var moment = require('moment');
          for(var i = 0; i < this.workouts.length; i++){
            for(var j=0; j < this.workouts[i].exercises.length;j++){
             this.title =this.workouts[i].exercises[j].name;
              for(var k=0; k<this.workouts[i].exercises[j].sets.length;k++){
                this.desc = "Weight: " + this.workouts[i].exercises[j].sets[k].weight + "kg x Reps: " + this.workouts[i].exercises[j].sets[k].reps;
                this.demoEvents.push({
                  date: moment(this.workouts[i].exercises[j].sets[k].created_at).format('YYYY/MM/DD'),
                  title: this.title,
                  desc: this.desc
                });
              }
            }
          }
  },
},
beforeMount(){
  this.addToArray()
},
}
</script>