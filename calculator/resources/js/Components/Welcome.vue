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
                <li>Enter numbers in the two textboxes.</li>
                <li>Select an operator from the dropdown.</li>
                <li>Click the 'Calculate' button.</li>
                <li>The result of the calculation will be displayed below the button.</li>
                <li>The last 10 calculations you've made are displayed in the 'Calculation History' section at the bottom of the page.</li>
            </ul>
            <Calculator @calculation-done="calculationDone = !calculationDone" />
            <p class="mt-4 mb-1">Calculation history:</p>
            <CalculationHistory :calculation-done="calculationDone" />
        </div>

    </div>
</template>
