<template>
    <div class="rounded-full text-white bg-blue-400 w-10 h-10 flex items-center border border-gray-400 justify-center">
        {{ userCircle }}
    </div>
</template>

<script>
    export default {
        name: "UserCircle",
        props:[
            'name'
        ],
        computed:{
            userCircle:function(){
                return this.name.match(/[A-Z]/g).slice(0 ,2).join('');
            }
        }
    }
</script>

<style scoped>

</style>
