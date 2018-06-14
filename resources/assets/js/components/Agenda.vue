<template>
  <div id="app">
    <vue-event-calendar :events="demoEvents"></vue-event-calendar>
  </div>
</template>

<script>
export default {
  name: 'agenda',
  props: ['sets','exercises'],
  data () {
    return {
      demoEvents: [],
      title: '',
      desc: '',
      xTimes: 0
    }
  },
  methods: {
    addToArray(){
      for(var i = 0; i < this.sets.length; i++){
        var moment = require('moment');
        var dateF = moment(this.sets[i].created_at).format('YYYY/MM/DD');
        
           // this.title = this.getName(this.sets[i].exercise_id);
          //  this.desc = this.sets[i].weight + 'x' + this.sets[i].reps;

           // console.log(this.title + ' en ' + this.desc);
           if(this.sets[i].exercise_id == this.sets[i+1].exercise_id){
            this.title = this.getName(this.sets[i].exercise_id);
            this.desc = this.sets[i].weight + 'x' + this.sets[i].reps + ' ' + this.sets[i+1].weight + 'x' + this.sets[i+1].reps;
          } else if (this.sets[i].exercise_id != this.sets[i-1].exercise_id){
            this.title = this.getName(this.sets[i].exercise_id);
            this.desc = this.sets[i].weight + 'x' + this.sets[i].reps;
          } else {
            this.date = 'double'; 
            this.title = 'double'; 
            this.desc = 'double';
          } 

        if (this.date != 'double' || this.title != 'double' || this.desc !='double'){
          this.demoEvents.push({
            date: moment(this.sets[i].created_at).format('YYYY/MM/DD'),
            title: this.title,
            desc: this.desc
          })
        }
    }
  },
  getName($exercise_id){
    for(var i = 0; i < this.exercises.length ; i++){
       if(this.exercises[i].id == $exercise_id){
        return this.exercises[i].name;
       
      }
    }
  }
},
beforeMount(){
  this.addToArray()
},
}
</script>