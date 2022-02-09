<template>
    <ItemDetails v-if="panel"/>
    <ItemList v-else />
</template>

<script>
    import ItemDetails from './catalog/ItemDetails'
    import ItemList from './catalog/ItemList'

    export default {
        components: {
            ItemDetails,
            ItemList
        },
        computed: {
            panel() {
                return this.$store.getters['wardrobe/panel']
            }
        }
    }
</script>