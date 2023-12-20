<template>
    <div>
        <input v-model="input1" type="number">
        <select v-model="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input v-model="input2" type="number">
        <button @click="calculate" class="px-4 py-2 mt-4 ml-2 font-bold text-white bg-blue-900 rounded hover:bg-blue-700">Calculate</button>
        <div class="mt-4">Result: {{ result }}</div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';

export default {
    setup() {
        const input1 = ref(0);
        const input2 = ref(0);
        const operator = ref('+');
        const result = ref(null);

        const calculate = () => {
            axios.post('/calculate', {
                input1: input1.value,
                input2: input2.value,
                operator: operator.value,
            }).then(response => {
                result.value = response.data.result;
            });
        };

        return {
            input1,
            input2,
            operator,
            result,
            calculate,
        };
    },
};
</script>
