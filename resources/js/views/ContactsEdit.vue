<template>
    <div>
        <div class="flex justify-between pb-4">
            <a href="#" class="text-blue-400 " @click="$router.back()">
                >Back
            </a>
        </div>

        <form @submit.prevent="submitForm">
            <InputField name="name" :errors="errors" label="Contact Name"
                        placeholder="Contact Name" @update:field="form.name=$event" :data="form.name"/>
            <InputField name="email" :errors="errors" label="Contact email" placeholder="Contact email"
                        @update:field="form.email=$event" :data="form.email"/>
            <InputField name="company" :errors="errors" label="Company" placeholder="Company" @update:field="form.company=$event" :data="form.company"/>
            <InputField name="birthday" :errors="errors" label="Birthday" placeholder="MM/DD/YYYY" @update:field="form.birthday=$event" :data="form.birthday"/>
            <div class="flex justify-end">
                <button class="py-2 px-4 text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="py-2 px-4 bg-blue-500 rounded text-white hover:bg-blue-400">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../components/InputField";

    export default {
        name: "ContactsCreate",
        components: {
            InputField: InputField
        },
        data: function () {
            return {
                form: {
                    'name': '',
                    'email': '',
                    'company': '',
                    'birthday': '',
                },
                errors: null
            }
        },
        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id).then(response => {
                this.form = response.data.data;
                this.loading = false;

            }).catch(errors => {
                this.loading = false;
                if (errors.response.status === 404) {
                    this.$router.push('/contacts');
                }
                console.log(errors)
            })

        },
        methods: {
            submitForm: function () {
                axios.patch('/api/contacts/'+this.$route.params.id, this.form).then(response => {
                    console.log(response.data)
                        this.$router.push(response.data.links.self)

                    }
                ).catch(errors => {
                    console.log(errors)
                    this.errors = errors.response.data.errors;
                })
            }
        }
    }
</script>

<style scoped>

</style>
