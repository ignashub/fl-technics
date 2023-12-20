<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Calculator from '@/Components/Calculator.vue';
import CalculationHistory from '@/Components/CalculationHistory.vue';
</script>

<template>
    <div>
        <div class="p-6 bg-white border-b border-gray-200 lg:p-8">
            <ApplicationLogo class="block w-auto h-12" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to the Calculator application!
            </h1>

            <p class="mt-6 leading-relaxed text-gray-500">
                This is a simple calculator application. To use it, enter numbers in the two textboxes, select an operator from the dropdown, and then click the 'Calculate' button. The result of the calculation will be displayed below the button. The last 10 calculations you've made are displayed in the 'Calculation History' section at the bottom of the page. Enjoy calculating!
            </p>
            <Calculator />
            <p class="mt-4 mb-1">Calculation history:</p>
            <CalculationHistory />
        </div>

    </div>
</template>
