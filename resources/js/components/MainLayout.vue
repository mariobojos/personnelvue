<template>
    <div>
        <base-layout>
            <template v-slot:header>
                Personnel Skills Profiler
            </template>
            <personne-list></personne-list>
        </base-layout>
    </div>
</template>

<script>

import BaseLayout from './BaseLayout.vue';
import PersonneList from './PersonnelList.vue';

export default {
    name: 'main-layout',

    components: {
        BaseLayout,
        PersonneList
    }
}
</script>

<style>

</style>
