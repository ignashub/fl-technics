<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { ref } from 'vue';
import Calculator from '@/Components/Calculator.vue';
import CalculationHistory from '@/Components/CalculationHistory.vue';

const components = {
    Calculator,
    CalculationHistory,
};

const calculationDone = ref(false);
</script>


<template>
    <div>
        <div class="p-6 bg-white border-b border-gray-200 lg:p-8">
            <ApplicationLogo class="block w-auto h-12" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to the Calculator application!
            </h1>

            <ul class="mt-2 list-disc list-inside text-gray-500">
                <li>Enter numbers in the textboxes.</li>
                <li>Select an operator from the buttons.</li>
                <li>Click the '=' button to get the result.</li>
                <li>The result of the calculation will be displayed on the screen.</li>
                <li>Your calculation history is displayed to the side.</li>
            </ul>

            <div class="calculator-container">
                <Calculator @calculation-done="calculationDone = !calculationDone" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.calculator-container {
    display: flex;
    align-items: flex-start;
}

.history-container {
    width: 300px;
    margin-left: 0;
}

.history-title {
    margin-bottom: 10px;
}
</style>