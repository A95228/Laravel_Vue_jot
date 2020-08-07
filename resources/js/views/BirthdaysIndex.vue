<template>
    <ContactsList endpoint="/api/birthdays"/>
</template>

<script>
    import ContactsList from "./ContactsList";
    export default {
        name: "ContactsIndex",
        components: {ContactsList},
    }
</script>

<style scoped>

</style>
