<template>
<div id="app">
  <h1>Vue calendar</h1>
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
        
        this.demoEvents.push({
          date: this.workouts[i].created_at,
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