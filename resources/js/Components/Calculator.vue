
<template>
    <div class="calculator-with-history" v-on:keyup="handleKeyup">
        <div class="calculator">
            <div class="display">{{ displayValue }}</div>
            <input v-model="inputValue" type="text" class="input"> <!-- Changed to type="text" -->
            <div class="operations">
                <button @click="setOperation('+')" class="operation-btn">+</button>
                <button @click="setOperation('-')" class="operation-btn">-</button>
                <button @click="setOperation('*')" class="operation-btn">×</button>
                <button @click="setOperation('/')" class="operation-btn">÷</button>
                <button @click="setOperation('%')" class="operation-btn">%</button>
                <button @click="setOperation('^')" class="operation-btn">^</button>
                <button @click="clearCalculator" class="operation-btn">C</button>
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
import { onMounted, onBeforeUnmount } from 'vue';

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
        const displayValue = ref('0');
        const calculationDone = ref(false);

        const handleKeyup = (event) => {
            if (document.activeElement === document.querySelector('.input')) {
                return;
            }
            switch (event.key) {
                case 'Enter':
                    if (inputValue.value) {
                        storedValue.value = inputValue.value;
                        displayValue.value = storedValue.value;
                        inputValue.value = '';
                        result.value = '';
                    } else if (result.value && !operator.value) {
                        storedValue.value = result.value;
                        displayValue.value = storedValue.value;
                        result.value = '';
                    }
                    break;
                case '+':
                    setOperation('+');
                    break;
                case '-':
                    setOperation('-');
                    break;
                case '*':
                    setOperation('*');
                    break;
                case '/':
                    setOperation('/');
                    break;
                default:
                    if (!isNaN(event.key)) {
                        inputValue.value += event.key;
                    }
                    break;
            }
        };

        onMounted(() => {
            window.addEventListener('keyup', handleKeyup);
        });

        onBeforeUnmount(() => {
            window.removeEventListener('keyup', handleKeyup);
        });

        const setOperation = (op) => {
            if (inputValue.value || result.value) {
                if (!inputValue.value && result.value) {
                    storedValue.value = result.value;
                } else if (inputValue.value) {
                    if (storedValue.value && operator.value) {
                        calculate();
                    } else {
                        storedValue.value = inputValue.value;
                    }
                }
                operator.value = op;
                displayValue.value = `${storedValue.value} ${op}`;
                inputValue.value = '';
            }
        };

        const calculate = () => {
            if (operator.value && (storedValue.value || result.value) && inputValue.value) {
                let input1 = storedValue.value || result.value;
                let input2 = inputValue.value;

                axios.post('/calculate', {
                    input1: input1,
                    input2: input2,
                    operator: operator.value,
                }).then(response => {
                    result.value = response.data.result;
                    displayValue.value = result.value;
                    // After calculation, storedValue is set to the result
                    storedValue.value = result.value;
                    // Reset the inputValue and operator to allow for a new operation
                    inputValue.value = '';
                    operator.value = null;
                    calculationDone.value = !calculationDone.value;
                    emit('calculation-done');
                });
            }
        };

        const clearCalculator = () => {
            inputValue.value = '';
            storedValue.value = '';
            operator.value = null;
            result.value = '';
            displayValue.value = '0';
            calculationDone.value = false;
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
            handleKeyup,
            clearCalculator,
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
    width: 300px;
    margin-left: 60px;
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
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 buttons per row */
    gap: 10px;
    margin-bottom: 20px;
}

.operation-btn {
    flex: 0 0 auto;
    padding: 15px 0;
    background-color: #ff6347;
    color: white;
    font-size: 1.5em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Adjust the width of the equals button if necessary */
.calculate-btn {
    grid-column: span 4; /* Makes the equals button span all columns */
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
