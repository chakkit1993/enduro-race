<template>
   
    <div>
            <div class="col-md">
                <div class="card clock-body">
                    <div class="card-header"> 
                 
                        </div>

                    <div class="card-body ">
                              <div id="clock" class="">
                          <p  class="clock-date clock-p" name="date" >{{date}}   {{time}}</p>
                          
                        </div>
                    </div>
                </div>
            </div>
       </div>

</template>

<script>
   var moment = require('moment');
    export default {
        
          data(){
            return{
                full_name:'',
                email:'',
                number: 0,
                address: '',
                date: moment().format('DD-MM-yyyy'),
                time: moment().format('h:mm:ss')
            }
        },
        mounted() {

            this.startInterval();
           // console.log('Component mounted.');
            console.log('Component Clock.');
        },   
        methods: {
             updateTimer :function (){
           this.date =  moment().format('DD-MM-yyyy');
           this.time =  moment().format('h:mm:ss');
          //console.log('Component Clock.'+ this.address)
          },
        startInterval :function () {
              setInterval(() => {
                this.updateTimer() 
                }, 500);
          }
         
      },
       
    }
</script>
