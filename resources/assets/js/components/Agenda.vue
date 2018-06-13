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
      demoEvents: []
    }
  },
  methods: {
    addToArray(){
      for(var i = 0; i < this.workouts.length; i++){

        var moment = require('moment');
        var dateF = moment(this.workouts[i].created_at).format('YYYY/MM/DD');
        console.log(dateF);
        
        this.demoEvents.push({
          date: moment(this.workouts[i].created_at).format('YYYY/MM/DD'),
          title: this.workouts[i].title,
          desc: this.workouts[i].description
        })
    }
  }
},
beforeMount(){
  this.addToArray()
},
}
</script>