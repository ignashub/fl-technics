<template>
    <div v-for="calculation in history" :key="calculation.id">
        {{ calculation.calculation }}
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
    setup() {
        const history = ref([]);

        onMounted(() => {
            axios.get('/history').then(response => {
                history.value = response.data.history;
            });
        });

        return {
            history,
        };
    },
};
</script>
