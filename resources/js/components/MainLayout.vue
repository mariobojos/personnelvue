<template>
    <div>
        <base-layout>
            <template v-slot:header>
                Personnel Skills Profiler
            </template>
            <router-view></router-view>
            <personne-list></personne-list>
        </base-layout>
    </div>
</template>

<script>

import BaseLayout from './BaseLayout.vue';
import PersonnelList from "./personnel/PersonnelList";

export default {
    name: 'main-layout',

    components: {
        BaseLayout,
        PersonnelList
    }
}
</script>
