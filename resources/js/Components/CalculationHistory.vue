<template>
    <div v-for="(calculation, index) in history" :key="calculation.id">
        {{ index + 1 }}. {{ calculation.calculation }}
    </div>
</template>

<script>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';

export default {
    props: ['calculationDone'],
    setup(props) {
        const history = ref([]);

        const fetchHistory = () => {
            axios.get('/history').then(response => {
                history.value = response.data.history;
            });
        };

        onMounted(fetchHistory);

        watch(() => props.calculationDone, fetchHistory);

        return {
            history,
        };
    },
};
</script>
