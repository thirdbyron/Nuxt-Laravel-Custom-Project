<template>
    <div id="app">
        <Aside />
        <div class="model">
            <Model />
        </div>
    </div>
</template>

<script>
import Model from "~/components/Model";
import Aside from "~/components/Aside";
export default {
    name: 'Catalog',
    components: {
        Aside,
        Model
    }
}
</script>