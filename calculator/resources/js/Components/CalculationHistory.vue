<template>
    <div v-for="(calculation, index) in history" :key="calculation.id">
        {{ index + 1 }}. {{ calculation.calculation }}
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
