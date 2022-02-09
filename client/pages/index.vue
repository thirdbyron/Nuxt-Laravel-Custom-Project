<template>
    <Enjecy />
</template>

<script>
const Enjecy = () => import('./catalog')
export default {
    name: 'IndexPage',
    components: {
        Enjecy
    }
}
</script>
