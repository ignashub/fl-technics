<template>
    <div v-for="(calculation) in history" :key="calculation.id">
        {{ calculation.calculation }}
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
