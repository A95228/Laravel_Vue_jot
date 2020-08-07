<template>
    <div class="relative pb-4">
        <label :for="name" class="absolute text-blue-500 uppercase text-xs font-bold pt-2">{{label}}</label>
        <input type="text"
               :id="name"
               class="pt-8 border-b pb-2 w-full focus:border-blue-400 focus:outline-none text-gray-900"
               :placeholder="placeholder"
               @input="updateField()"
               v-model="value"
        >
        <p class = "text-red-600 text-sm" v-text="errorMessage()">Error</p>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props:[
            'name','label','placeholder','errors','data'
        ],
        data:function(){
          return{
              value:''
          }
        },
        computed:{
          hasError:function(){
              return this.errors&& this.errors[this.name] && this.errors[this.name].length>0
          }
        },
        watch:{
          data:function (val) {
              this.value=val
          }
        },
        methods:{
            updateField:function () {
                this.clearErrors(this.name);

                this.$emit('update:field',this.value)
            },
            errorMessage:function () {
                if(this.hasError){
                    return this.errors[this.name][0];
                }
            },
            clearErrors:function () {
                if(this.hasError){
                    this.errors[this.name] = null;
                }
            },
            errorClassObject:function () {
                return{
                    'error-field':this.hasError
                }
            }
        }
    }
</script>

<style scoped>

</style>
