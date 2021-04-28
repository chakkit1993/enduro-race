<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                          <input type="text" v-model="date" class="form-control" name="date" >
                    
                        I'm an example component. 
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
                number:'',
                address:'',
                date: moment().format()
            }
        },
        mounted() {
           // console.log('Component mounted.');
            console.log('Component mounted.'+ moment().format());
            this.getData
        },

        medthod:{
            getData(){
                consolr.log("hello divison ");
            }

        }
    }
</script>
