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
    <div class="parent-container">
        <ApplicationLogo class="block h-28" />

        <div class="content-container">
            <div class="text-container">
                <h1 class="text-2xl font-medium text-gray-900">
                    Welcome to the Calculator application!
                </h1>
                <ul class="mt-4 list-disc list-inside text-gray-500">
                    <li>Use keyboard or mouse to enter numbers.</li>
                    <li>The result of the calculation will be displayed on the screen.</li>
                    <li>Your calculation history is displayed on the side.</li>
                </ul>
            </div>

            <div class="calculator-container">
                <Calculator @calculation-done="calculationDone = !calculationDone" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.parent-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 50vh;
}

.content-container {
    display: flex;
    justify-content: space-around;
    width: 100%;
    max-width: 1000px;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 40px;
}

.text-container {
    flex: 1;
    padding-right: 2rem;
}

.calculator-container {
    flex: 1;
    padding-left: 2rem;
}

.history-container {
    width: 300px;
    margin-left: 2rem;
}

.history-title {
    margin-bottom: 10px;
}
</style>
