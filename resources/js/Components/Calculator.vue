
<template>
    <div class="calculator-with-history">
        <div class="calculator">
            <!-- Existing calculator template -->
            <div class="display">{{ displayValue }}</div>
            <input v-model="inputValue" type="number" class="input">
            <!-- Operation buttons -->
            <div class="operations">
                <button @click="setOperation('+')" class="operation-btn">+</button>
                <button @click="setOperation('-')" class="operation-btn">-</button>
                <button @click="setOperation('*')" class="operation-btn">×</button>
                <button @click="setOperation('/')" class="operation-btn">÷</button>
            </div>
            <button @click="calculate" class="calculate-btn">=</button>
        </div>
        <div class="history-container">
            <p class="history-title">Calculation history:</p>
            <CalculationHistory :calculation-done="calculationDone" />
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import CalculationHistory from '@/Components/CalculationHistory.vue';

export default {
    components: {
        CalculationHistory,
    },
    emits: ['calculation-done'],
    setup(props, { emit }) {
        const inputValue = ref('');
        const storedValue = ref('');
        const operator = ref(null);
        const result = ref('');
        const displayValue = ref('');
        const calculationDone = ref(false);

        const setOperation = (op) => {
            if (inputValue.value) {
                storedValue.value = inputValue.value;
                operator.value = op;
                displayValue.value = `${storedValue.value} ${op}`;
                inputValue.value = '';
            }
        };

        const calculate = () => {
            if (storedValue.value && inputValue.value && operator.value) {
                axios.post('/calculate', {
                    input1: storedValue.value,
                    input2: inputValue.value,
                    operator: operator.value,
                }).then(response => {
                    result.value = response.data.result;
                    displayValue.value = `${storedValue.value} ${operator.value} ${inputValue.value} = ${result.value}`; // Update the display with the full calculation
                    inputValue.value = ''; // Optionally clear the input field
                    storedValue.value = ''; // Clear the stored value
                    operator.value = null; // Clear the operator
                    calculationDone.value = !calculationDone.value;
                    emit('calculation-done');
                });
            }
        };
        return {
            inputValue,
            storedValue,
            operator,
            result,
            displayValue,
            calculationDone,
            calculate,
            setOperation,
        };
    },
};
</script>

<style scoped>
.calculator-with-history {
    display: flex;
    align-items: flex-start;
}
.history-container {
    width: 300px; /* Adjust width as needed */
    margin-left: 10px; /* Adjust as needed for spacing */
}
.calculator {
    background-color: #333;
    color: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: auto;
}

.display {
    background-color: #222;
    padding: 10px;
    margin-bottom: 20px;
    text-align: right;
    font-size: 2em;
    border-radius: 5px;
}

.input {
    color: black;
    margin-bottom: 20px;
}

.input, .operator {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: none;
}

.calculate-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.calculate-btn:hover {
    background-color: #0056b3;
}

.result {
    margin-top: 20px;
}

.operations {
    display: flex;
    justify-content: center; /* Center the buttons horizontally */
    gap: 10px; /* Add space between buttons */
    margin-bottom: 20px;
}

.operation-btn {
    flex: 0 0 auto; /* Do not grow, do not shrink, and be based on width */
    width: 20%; /* Set a base width for each button */
    padding: 15px 0; /* More padding for a taller button */
    /* The rest of your styles remain the same */
    background-color: #ff6347;
    color: white;
    font-size: 1.5em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.operation-btn:hover {
    background-color: #e55347;
}
</style>
